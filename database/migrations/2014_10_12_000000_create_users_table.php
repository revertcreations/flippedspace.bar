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
            $table->string('f_name', 60)->nullable();
            $table->string('l_name', 60)->nullable();
            $table->string('street', 60)->nullable();
            $table->string('city', 60)->nullable();
            $table->string('state', 60)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->integer('country_id')->nullable()->unsigned()->index();
            $table->float('lat', 10, 6)->nullable();
            $table->float('lng', 10, 6)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
