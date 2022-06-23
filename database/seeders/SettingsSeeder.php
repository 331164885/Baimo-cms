<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        DB::table('baimo_settings')->truncate();

        $baimo_settings = [

        ];

        DB::table('baimo_settings')->insert($baimo_settings);
    }
}
