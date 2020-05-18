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
            $table->string('nif')->unique();
            $table->enum('role', ['Usuario', 'Administrador'])->nullable()->default('Usuario');
            $table->string('name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('avatar')->default('avatar.png');
            $table->string('password');
            $table->date('date_birth');
            $table->string('email')->unique();
            $table->bigInteger('badge_selected')->unsigned()->default(10);
            $table->string('province');
            $table->string('location');
            $table->string('telephone_number');
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
