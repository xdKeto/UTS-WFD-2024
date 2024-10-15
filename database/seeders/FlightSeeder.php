<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('flights')->insert([
            [
                'flight_code' => 'JT60',
                'origin'=> 'SUB',
                'destination'=> 'JKT',
                'departure_time'=> '2024-12-24 13:00:00',
                'arrival_time'=> '2024-12-24 18:00:00',
            ],
            [
                'flight_code' => 'KT30',
                'origin'=> 'JKT',
                'destination'=> 'SUB',
                'departure_time'=> '2024-12-25 13:00:00',
                'arrival_time'=> '2024-12-25 18:00:00',
            ],
            [
                'flight_code' => 'DT90',
                'origin'=> 'SUB',
                'destination'=> 'AUS',
                'departure_time'=> '2024-12-24 13:00:00',
                'arrival_time'=> '2024-12-24 20:00:00',
            ],
            [
                'flight_code' => 'LT60',
                'origin'=> 'AUS',
                'destination'=> 'SUB',
                'departure_time'=> '2024-12-24 13:00:00',
                'arrival_time'=> '2024-12-24 20:00:00',
            ],
            [
                'flight_code' => 'RT60',
                'origin'=> 'SUB',
                'destination'=> 'SG',
                'departure_time'=> '2024-11-24 13:00:00',
                'arrival_time'=> '2024-11-24 17:00:00',
            ],
            [
                'flight_code' => 'GT60',
                'origin'=> 'SG',
                'destination'=> 'SUB',
                'departure_time'=> '2024-11-24 13:00:00',
                'arrival_time'=> '2024-11-24 17:00:00',
            ],

            
        ]);
    }
}