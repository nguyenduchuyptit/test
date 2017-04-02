<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idSubCate')->unsigned();
            $table->foreign('idSubCate')->references('id')->on('sub_category');
            $table->integer('idBrand')->unsigned();
            $table->foreign('idBrand')->references('id')->on('brand');
            $table->string('ten','200');
            $table->string('tenkodau','200');
            $table->string('tomtat');
            $table->text('noidung');
            $table->string('keyword');
            $table->string('hinh');
            $table->string('hinh2');
            $table->string('hinh3');
            $table->integer('gia')->unsigned();
            $table->integer('soluong')->unsigned();
            $table->integer('noibat')->default(0);
            $table->integer('soluotxem')->default(0);
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
        Schema::dropIfExists('product');
    }
}
