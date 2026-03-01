<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassRoomsSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('class_rooms')->exists()) return;

        foreach (['Room 101', 'Room 102', 'Room 103', 'Room 201', 'Room 202'] as $name) {
            DB::table('class_rooms')->insert([
                'name' => $name,
                'school_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $this->command->info('Class rooms created.');
    }
}
