<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Donations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('id_user')->unsigned()->nullable();
            $table->enum('reason', ['Ofrenda de amor', 'Me gustan los animales', 'Me gusta ayudar']);
            $table->Integer('ammount');   
            $table->enum('payment_method', ['Credit card', 'Debit card', 'Paypal']);

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
        Schema::dropIfExists('donations');
    }
}
