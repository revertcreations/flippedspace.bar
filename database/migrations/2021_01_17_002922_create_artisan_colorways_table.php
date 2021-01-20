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
            $table->foreignId('artisan_scuplt_id')->constrained('artisan_sculpts');
            $table->string('name');
            $table->string('keycap_archivist_img');
            $table->string('keycap_archivist_id');
            $table->string('keycap_archivist_isCover');
            $table->string('keycap_archivist_note');
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
