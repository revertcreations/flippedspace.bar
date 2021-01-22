<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtisanColorwaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artisan_colorways', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('artisan_id')->constrained('artisans');
            $table->foreignId('artisan_sculpt_id')->constrained('artisan_sculpts');
            $table->string('name');
            $table->text('keycap_archivist_img');
            $table->string('keycap_archivist_id');
            $table->string('keycap_archivist_is_cover');
            $table->text('keycap_archivist_note')->nullable();
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
        Schema::dropIfExists('artisan_colorways');
    }
}
