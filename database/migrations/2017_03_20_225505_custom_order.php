<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCustom')->unsigned()->nullable();
            $table->foreign('idCustom')->references('id')->on('customer');
            $table->integer('idPro');
            $table->integer('qty');
            $table->float('price');
            $table->float('total');
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
        Schema::dropIfExists('custom_order');
    }
}
