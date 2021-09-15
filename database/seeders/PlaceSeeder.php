<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([
            'name' => 'Moscow',
            'type' => 'City',
        ]);
        
        DB::table('places')->insert([
            'name' => 'Berlin',
            'type' => 'City',
        ]);

        DB::table('places')->insert([
            'name' => 'Tokyo',
            'type' => 'City',
        ]);

        DB::table('places')->insert([
            'name' => 'Lisabon',
            'type' => 'City',
        ]);
    }
}
