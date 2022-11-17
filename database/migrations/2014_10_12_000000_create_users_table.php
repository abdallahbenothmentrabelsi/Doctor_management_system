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
            $table->bigIncrements('id');         
            $table->string('name');
            $table->string('lastname');
            $table->timestamp('dateofbirth');
            $table->string('email')->unique();
            $table->string('phonenumber');
            $table->string('gender');
            $table->string('country');
            $table->string('city');
            $table->smallInteger('postalcode');
            $table->string('role')->nullable();
            $table->string('institution'); 
            $table->string('description'); 
            $table->string('password');
            $table->string('usertype')->nullable();  
            $table->string('avatar')->default('defalt.jpg');     
            $table->timestamp('email_verified_at')->nullable();
            $table->smallInteger('approved')->default(0)->nullable();
            $table->boolean('block')->default(0)->nullable();
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
