<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_user')->unsigned();
            $table->date('date_order');
            $table->bigInteger('coupon_id')->unsigned()->nullable();
            $table->integer('descuento')->nullable();
            $table->double('total_price',8,2);
            $table->enum('payment_method', ['Credit card', 'Debit Card', 'Paypal']);
            $table->date('expected_arrival');
            $table->enum('status', ['Order Processed', 'Order Shipped', 'Order En Route', 'Order Arrived']);
            $table->string('USPS');
            $table->string('street');
            $table->string('number');
            $table->mediumInteger('postal_code');
            $table->string('location');
            $table->string('province');
            $table->string('country');
            $table->enum('way', ['plaza', 'avenida', 'bulevar', 'calle']);
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
        Schema::dropIfExists('orders');
    }
}
