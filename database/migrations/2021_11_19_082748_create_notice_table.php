<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baimo_notice', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->comment("通知标题");
            $table->text('body')->comment("通知内容");
            $table->integer('sort')->comment("排序");
            $table->integer('is_top')->comment("是否置顶");
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
        Schema::dropIfExists('baimo_notice');
    }
}
