<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('classes')->exists()) return;

        $classes = [
            ['name' => 'Class 1', 'school_id' => 1],
            ['name' => 'Class 2', 'school_id' => 1],
            ['name' => 'Class 3', 'school_id' => 1],
            ['name' => 'Class 4', 'school_id' => 1],
            ['name' => 'Class 5', 'school_id' => 1],
        ];
        foreach ($classes as $i => $c) {
            DB::table('classes')->insert([
                'name' => $c['name'],
                'school_id' => $c['school_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $this->command->info('Classes created.');
    }
}
