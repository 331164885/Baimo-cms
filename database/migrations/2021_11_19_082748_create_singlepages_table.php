<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinglepageagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baimo_singlepages', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->comment("页面标题");
            $table->integer('menu_id')->comment("所属菜单ID");
            $table->string('meta_keywords', 255)->comment("页面关键词");
            $table->string('meta_description', 255)->comment("页面描述");
            $table->text('body')->comment("页面内容");
            $table->text('css')->comment("页面CSS");
            $table->text('javascript')->comment("页面javascript脚本");
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
        Schema::dropIfExists('baimo_singlepages');
    }
}
