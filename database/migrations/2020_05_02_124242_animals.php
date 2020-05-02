<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Animals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
   Schema::create('animals', function (Blueprint $table){
   $table->bigIncrements('id');
   $table->bigInteger('id_user')->unsigned()->nullable();
   $table->string('race');
   $table->string('species');
   $table->enum('gender', ['Hembra', 'Macho']);
   $table->date('date_of_birth');
   $table->string('description');
   $table->string('health');
   $table->string('nickname');
   $table->string('place_found');
   $table->string('size');
   $table->date('date_found');
   $table->string('condition')->nullable();
   $table->timestamps();

   });

    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('animals');
    }
}
