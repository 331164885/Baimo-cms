<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('baimo_articles', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_id')->comment("所属菜单ID");
            $table->string('subject', 255)->comment("标题");
            $table->text('body')->comment("内容");
            $table->string('author', 80)->comment("作者");
            $table->string('front_cover', 255)->comment("封面图片");
            $table->integer('pageviews')->comment("浏览量");
            $table->string('meta_keywords', 255)->comment("SEO关键词");
            $table->string('meta_description', 255)->comment("SEO页面描述");
            $table->integer('tag')->comment("所属标签的ID");
            $table->integer('is_top')->comment("是否置顶");
            $table->integer('is_recommend')->comment("是否推荐");
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
        Schema::dropIfExists('baimo_articles');
    }
}
