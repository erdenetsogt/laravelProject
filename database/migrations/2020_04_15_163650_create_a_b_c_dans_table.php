<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateABCDansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_b_c_dans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();            
            $table->dateTime('date');            
            $table->decimal('amount',12,2);
            $table->decimal('balance',12,2);
            $table->string('dans')->nullable();
            $table->string('countryPart')->nullable();
            $table->string('line')->nullable();
            $table->string('channel')->nullable();
            $table->string('type')->nullable();
            $table->string('purpose')->nullable();            
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
        Schema::dropIfExists('a_b_c_dans');
    }
}
