<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Petitions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petitions', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->bigInteger('id_user')->unsigned();
        $table->bigInteger('id_animal')->unsigned();
        $table->string('name_petition');
        $table->string('email_petition');
        $table->string('telephone_number');
        $table->string('commentary');
        $table->enum('Status', ['Sended', 'Accepted', 'Cancelled']);
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
        Schema::dropIfExists('petitions');
    }
}
