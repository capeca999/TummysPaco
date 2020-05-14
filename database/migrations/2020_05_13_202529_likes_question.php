<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LikesQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_questions', function (Blueprint $table) {
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_question')->unsigned();
            $table->primary(['id_question', 'id_user']);
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
        Schema::dropIfExists('like_questions');

    }
}
