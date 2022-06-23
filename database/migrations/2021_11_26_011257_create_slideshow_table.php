<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlideshowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baimo_slideshow', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->comment("标题");
            $table->text('description')->comment("简单描述");
            $table->string('image', 255)->commit("图片地址");
            $table->string('url')->comment("链接地址");
            $table->integer('sort')->comment("排序");
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
        Schema::dropIfExists('baimo_slideshow');
    }
}
