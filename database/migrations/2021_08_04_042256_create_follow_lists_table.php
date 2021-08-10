<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('product_id');
            $table->integer('color_id');
            $table->integer('price')->comment('產品價格');
            $table->float('discount',5,2);
            $table->string('name')->comment('名稱');
            $table->string('nickname')->comment('名稱');
            $table->longText('photo')->comment('圖片');
            $table->string('color')->comment('顏色名稱');
            $table->string('size')->comment('尺寸');
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
        Schema::dropIfExists('follow_lists');
    }
}
