<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUser')->unsigned()->nullable();
            $table->foreign('idUser')->references('id')->on('users');
            $table->integer('idPro')->unsigned()->nullable();
            $table->foreign('idPro')->references('id')->on('product');
            $table->string('ten');
            $table->string('email');
            $table->text('noidung');
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
        Schema::dropIfExists('comment_product');
    }
}
