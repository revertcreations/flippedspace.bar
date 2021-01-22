<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('artisans_collection_id')->constrained('artisans_collection');
            $table->string('title');
            $table->enum('condition', ['Brand New', 'Mint', 'Excellent', 'Very Good', 'Good', 'Fair', 'Poor', 'For Parts Only']);
            $table->decimal('price', 9,2);
            $table->text('description');
            $table->decimal('shipping_cost');
            $table->boolean('allow_offers')->default(false);
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
        Schema::dropIfExists('listings');
    }
}
