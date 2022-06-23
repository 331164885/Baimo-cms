<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baimo_friendlinks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->comment("链接名称");
            $table->string('link', 255)->comment("链接地址");
            $table->string('icon', 255)->comment("链接图标");
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
        Schema::dropIfExists('baimo_friendlinks');
    }
}
