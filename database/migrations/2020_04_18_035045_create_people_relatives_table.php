<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleRelativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_relatives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('edited_user_id')->unsigned()->nullable();            
            $table->integer('relativeType')->unsigned()->nullable();            
            $table->string('name',25)->nullable();
            $table->string('birthYear',4)->nullable();
            $table->string('liveLocation',100)->nullable();
            $table->string('job')->nullable();                        
            $table->timestamps();
            $table->foreign('edited_user_id')->references('id')->on('users');
            $table->foreign('relativeType')->references('id')->on('lovs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people_relatives');
    }
}
