<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baimo_settings', function (Blueprint $table) {
            $table->id();
            $table->string('group_name', 255)->default('config')->comment("分组名称");
            $table->string('key_name', 255)->comment("键名称");
            $table->string('value', 255)->comment("键值");
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
        Schema::dropIfExists('baimo_settings');
    }
}
