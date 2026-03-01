<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdmitCardsSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('admit_cards')->exists()) return;

        DB::table('admit_cards')->insert([
            'template' => 'default',
            'heading' => 'Admit Card',
            'title' => 'Annual Examination',
            'school_id' => 1,
            'exam_center' => 'Main Hall',
            'footer_text' => 'ClassKira School',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->command->info('Admit card template created.');
    }
}
