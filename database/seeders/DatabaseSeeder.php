<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * 基础数据填充
     **/
    public function run()
    {
        Model::unguard();
        $this->call(SettingsSeeder::class);
        Model::reguard();
    }
}
