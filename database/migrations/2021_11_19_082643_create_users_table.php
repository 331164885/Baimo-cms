<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('baimo_users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60)->comment("用户名");
            $table->string('email', 255)->unique()->comment("用户邮箱");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment("密码");
            $table->rememberToken();
            $table->string('avatar')->comment("用户头像");
            $table->string('oauth_id', 50)->comment("oauth id");
            $table->string('oauth_type', 50)->comment("oauth type");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('baimo_users');
    }
}
