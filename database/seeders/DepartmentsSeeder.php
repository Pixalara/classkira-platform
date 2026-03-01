<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('departments')->exists()) return;

        $depts = ['Science', 'Arts', 'Commerce', 'General'];
        foreach ($depts as $name) {
            DB::table('departments')->insert([
                'name' => $name,
                'school_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $this->command->info('Departments created.');
    }
}
