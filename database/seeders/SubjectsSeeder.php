<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('subjects')->exists()) return;

        $subjects = ['Mathematics', 'English', 'Science', 'Social Studies', 'Bengali'];
        $timestamp = time();
        foreach ($subjects as $i => $name) {
            DB::table('subjects')->insert([
                'name' => $name,
                'class_id' => 1,
                'school_id' => 1,
                'session_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $this->command->info('Subjects created.');
    }
}
