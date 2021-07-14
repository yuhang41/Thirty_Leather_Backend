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
            $table->integer('product_type_id')->comment('產品種類ID');
            $table->string('product_name')->comment('產品名稱');
            $table->string('product_nickname')->comment('產品別稱');
            $table->integer('price')->comment('產品價格');
            $table->string('size')->comment('尺寸');
            $table->string('color')->comment('顏色');
            $table->integer('product_quantity')->comment('產品庫存量');
            $table->longText('content')->comment('產品描述');
            $table->longText('photo')->comment('圖片')->default('https://placeholder.pics/svg/300x500');
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
