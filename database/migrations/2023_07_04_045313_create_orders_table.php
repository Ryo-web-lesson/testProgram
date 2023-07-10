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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->comment('顧客ID');
            $table->foreign('customer_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('cascade');
            $table->string('name')->comment('宛名');
            $table->integer('postal_code')->comment('郵便番号');
            $table->string('prefecture')->comment('都道府県');
            $table->string('address1')->comment('住所1');
            $table->string('address2')->nullable()->comment('住所2');
            $table->integer('postage')->comment('送料');
            $table->integer('billing_amount')->comment('請求金額');
            $table->integer('status')->default('0')->comment('注文ステータス');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
