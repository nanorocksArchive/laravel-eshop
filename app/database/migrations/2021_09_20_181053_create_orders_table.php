<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string(\App\Models\Order::HASH);
            $table->float(\App\Models\Order::TOTAL);
            $table->boolean(\App\Models\Order::PAID)->default(false);
            $table->bigInteger(\App\Models\Order::ADDRESS_ID);
            $table->bigInteger(\App\Models\Order::CUSTOMER_ID);
            $table->string(\App\Models\Order::COMMENT)->nullable();
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
