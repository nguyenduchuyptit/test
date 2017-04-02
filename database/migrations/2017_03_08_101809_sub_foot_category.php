<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubFootCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_foot_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idFoot')->unsigned();
            $table->foreign('idFoot')->references('id')->on('foot_category');
            $table->string('ten','200');
            $table->string('tenkodau','200');
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
        Schema::dropIfExists('sub_foot_category');
    }
}
