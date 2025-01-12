<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->insert([
            [
                'title' => 'System Crash',
                'description' => 'The server crashed unexpectedly.',
                'email' => 'admin@example.com',
                'priority' => 'High',
                'organization'  =>'Thai Asia',
                'vessel' => 'boat Thai Asia' ,
                'service_Line' => '10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Feature Request',
                'description' => 'Add a new reporting feature.',
                'email' => 'user@example.com',
                'priority' => 'Medium',
                'organization'  =>'Thai Asia',
                'vessel' => 'boat Thai Asia' ,
                'service_Line' => '10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
