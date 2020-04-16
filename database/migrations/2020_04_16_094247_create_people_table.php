<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('edited_user_id')->unsigned()->nullable();            
            $table->string('registrNr',10);            
            $table->string('familyName',25)->nullable();
            $table->string('lastName',25)->nullable();
            $table->string('firstName',25)->nullable();
            $table->date('birthDate')->nullable();
            $table->string('birthPlace',400)->nullable();
            $table->integer('gender')->unsigned();            
            $table->timestamps();
            $table->foreign('edited_user_id')->references('id')->on('users');
            $table->foreign('gender')->references('id')->on('lovs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
