<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baimo_menus', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->comment("所属上级ID");
            $table->string('name', 255)->comment("菜单名称");
            $table->string('sub_name', 255)->comment("子菜单名称");
            $table->integer('content_type')->comment("页面类型");
            $table->string('icon', 255)->comment("菜单图标");
            $table->string('url', 255)->comment("链接地址");
            $table->integer('sort')->comment("显示顺序");
            $table->integer('is_index')->comment("是否是首页");
            $table->integer('is_show')->comment("是否展示");
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
        Schema::dropIfExists('baimo_menus');
    }
}
