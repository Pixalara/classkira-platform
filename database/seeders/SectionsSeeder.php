<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('sections')->exists()) return;

        $sections = [];
        for ($classId = 1; $classId <= 5; $classId++) {
            $sections[] = ['name' => 'Section A', 'class_id' => $classId];
            $sections[] = ['name' => 'Section B', 'class_id' => $classId];
        }
        foreach ($sections as $s) {
            DB::table('sections')->insert([
                'name' => $s['name'],
                'class_id' => $s['class_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $this->command->info('Sections created.');
    }
}
