<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->boolean('verified')->default(false);
            $table->string('password');
            $table->string('username');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            // $table->string('stripe_id')->nullable()->index();
            // $table->string('card_brand')->nullable();
            // $table->string('card_last_four', 4)->nullable();
            // $table->timestamp('trial_ends_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
