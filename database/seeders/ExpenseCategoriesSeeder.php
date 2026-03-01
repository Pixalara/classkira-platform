<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseCategoriesSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('expense_categories')->exists()) return;

        $cats = ['Salary', 'Utilities', 'Supplies', 'Maintenance', 'Other'];
        foreach ($cats as $name) {
            DB::table('expense_categories')->insert([
                'name' => $name,
                'school_id' => 1,
                'session_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $this->command->info('Expense categories created.');
    }
}
