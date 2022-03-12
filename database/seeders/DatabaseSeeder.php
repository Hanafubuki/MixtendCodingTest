<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meetings')->insert([
            'summary' => 'Meeting 1',
            'date' => '2021-03-22',
            'start' => '10:00',
            'end' => '11:00',
            'timezone' => 'Asia/Tokyo',
        ]);
        DB::table('meetings')->insert([
            'summary' => 'Meeting 2',
            'date' => '2021-03-23',
            'start' => '14:00',
            'end' => '15:00',
            'timezone' => 'Asia/Tokyo',
        ]);
        DB::table('meetings')->insert([
            'summary' => 'Meeting 3',
            'date' => '2021-03-23',
            'start' => '16:00',
            'end' => '17:00',
            'timezone' => 'Asia/Tokyo',
        ]);
        DB::table('meetings')->insert([
            'summary' => 'Meeting 4',
            'date' => '2021-03-24',
            'start' => '10:30',
            'end' => '11:30',
            'timezone' => 'Asia/Tokyo',
        ]);
        DB::table('working_hours')->insert([
            'start' => '10:00',
            'end' => '19:00',
        ]);
    }
}
