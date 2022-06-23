<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baimo_content_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45)->comment("类型名称");
            $table->string('mark_name', 45)->comment("标识名称，英文");
            $table->string('value', 45)->comment("类型值");
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
        Schema::dropIfExists('baimo_content_types');
    }
}
