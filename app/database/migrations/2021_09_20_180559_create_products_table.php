<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string(\App\Models\Product::TITLE);
            $table->string(\App\Models\Product::SLUG);
            $table->text(\App\Models\Product::DESCRIPTION);
            $table->float(\App\Models\Product::PRICE);
            $table->string(\App\Models\Product::IMAGE);
            $table->integer(\App\Models\Product::STOCK);
            $table->jsonb(\App\Models\Product::ADDITIONAL)->nullable()->default(null);
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
        Schema::dropIfExists('products');
    }
}
