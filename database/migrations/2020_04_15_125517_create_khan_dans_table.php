<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhanDansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khan_dans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('user_id')->unsigned();            
            $table->dateTime('date');
            $table->string('sub');            
            $table->decimal('start',8,2);
            $table->decimal('debit',8,2);
            $table->decimal('credit',8,2);
            $table->decimal('end',8,2);
            $table->string('desc');
            $table->string('dans');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khan_dans');
    }
}
