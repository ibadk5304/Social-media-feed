<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            'name' => 'Cerulean',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/cerulean/bootstrap.min.css',
            'created_by'=>'3'
            ]);
        DB::table('themes')->insert([
            'name' => 'Cosmo',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/cosmo/bootstrap.min.css',
            'created_by'=>'3'
        ]);
        DB::table('themes')->insert([
            'name' => 'Cyborg',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/cyborg/bootstrap.min.css',
            'created_by'=>'3'
        ]);
    }
}
