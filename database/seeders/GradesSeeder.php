<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradesSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('grades')->exists()) return;

        $grades = [
            ['name' => 'A+', 'grade_point' => '4.00', 'mark_from' => 80, 'mark_upto' => 100],
            ['name' => 'A', 'grade_point' => '3.75', 'mark_from' => 70, 'mark_upto' => 79],
            ['name' => 'A-', 'grade_point' => '3.50', 'mark_from' => 60, 'mark_upto' => 69],
            ['name' => 'B', 'grade_point' => '3.00', 'mark_from' => 50, 'mark_upto' => 59],
            ['name' => 'C', 'grade_point' => '2.00', 'mark_from' => 40, 'mark_upto' => 49],
            ['name' => 'D', 'grade_point' => '1.00', 'mark_from' => 33, 'mark_upto' => 39],
            ['name' => 'F', 'grade_point' => '0.00', 'mark_from' => 0, 'mark_upto' => 32],
        ];
        foreach ($grades as $g) {
            DB::table('grades')->insert([
                'name' => $g['name'],
                'grade_point' => $g['grade_point'],
                'mark_from' => $g['mark_from'],
                'mark_upto' => $g['mark_upto'],
                'school_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $this->command->info('Grades created.');
    }
}
