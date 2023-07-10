<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order__detaills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->comment('顧客ID');
            $table->foreign('customer_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('cascade');
            $table->BigInteger('order_id')->comment('購入ID');
            $table->BigInteger('product_id')->comment('商品ID');
            $table->integer('price')->comment('決済時商品単価');
            $table->integer('quantity')->comment('数量');
            $table->string('imgpath')->comment('画像パス');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order__detaills');
    }
};
