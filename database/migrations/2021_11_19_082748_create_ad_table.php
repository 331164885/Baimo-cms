<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baimo_ad', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->comment("名称");
            $table->string('image_link', 255)->comment("图片地址");
            $table->string('url', 255)->comment("图片链接");
            $table->integer('position')->comment("显示位置");
            $table->integer('is_show')->comment("是否显示");
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
        Schema::dropIfExists('baimo_ad');
    }
}
