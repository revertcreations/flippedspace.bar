<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserArtisanColorwayImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_artisan_colorway_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_artisan_colorway_id')->constrained('users_artisan_colorways');
            $table->foreignId('artisan_colorway_id')->constrained('artisan_colorways');
            $table->string('cloudinary_secure_path');
            $table->string('cloudinary_public_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_artisan_colorway_images');
    }
}
