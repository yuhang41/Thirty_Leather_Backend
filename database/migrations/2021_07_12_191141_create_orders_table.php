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
            $table->integer('user_id')->nullable();
            $table->string('order_no');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('address')->comment('地址');
            $table->integer('price')->comment('價錢');
            $table->string('pay_type')->comment('付款方式');
            $table->string('shipping')->comment('運送方式');
            $table->integer('shipping_fee')->comment('運費');
            $table->integer('shipping_status_id')->comment('運送狀態編號');
            $table->integer('order_status_id')->comment('訂單狀態編號');
            $table->longText('remark')->nullable();
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
