<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamCategoriesSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('exam_categories')->exists()) return;

        $cats = [
            ['name' => 'First Term', 'timestamp' => time()],
            ['name' => 'Mid Term', 'timestamp' => time()],
            ['name' => 'Final Exam', 'timestamp' => time()],
        ];
        foreach ($cats as $c) {
            DB::table('exam_categories')->insert([
                'name' => $c['name'],
                'school_id' => 1,
                'session_id' => 1,
                'timestamp' => $c['timestamp'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $this->command->info('Exam categories created.');
    }
}
