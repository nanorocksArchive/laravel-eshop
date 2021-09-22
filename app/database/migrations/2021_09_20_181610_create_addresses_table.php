<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string(\App\Models\Address::ADDRESS1);
            $table->string(\App\Models\Address::ADDRESS2);
            $table->string(\App\Models\Address::STATE);
            $table->string(\App\Models\Address::COUNTRY);
            $table->string(\App\Models\Address::POST_CODE);
            $table->string(\App\Models\Address::CITY);
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
        Schema::dropIfExists('addresses');
    }
}
