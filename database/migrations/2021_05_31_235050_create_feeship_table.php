<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeship', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matp');
            $table->foreign('matp')->references('matp')->on('provinces')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('maqh');
            $table->foreign('maqh')->references('maqh')->on('districts')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('feeship');
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
        Schema::dropIfExists('feeship');
    }
}
