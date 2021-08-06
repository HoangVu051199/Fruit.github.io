<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone', 11);
            $table->string('customer_address');
            $table->longText('customer_note');
            $table->tinyInteger('payment_method');
            $table->unsignedBigInteger('provinces_id');
            $table->foreign('provinces_id')->references('matp')->on('provinces')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('districts_id');
            $table->foreign('districts_id')->references('id')->on('districts')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('wards_id');
            $table->foreign('wards_id')->references('id')->on('wards')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
