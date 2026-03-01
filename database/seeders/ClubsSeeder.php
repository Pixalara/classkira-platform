<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubsSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('clubs')->exists()) return;

        $clubs = [
            ['club_name' => 'Science Club', 'description' => 'Science and technology activities'],
            ['club_name' => 'Sports Club', 'description' => 'Sports and physical activities'],
            ['club_name' => 'Cultural Club', 'description' => 'Arts and cultural events'],
            ['club_name' => 'Debate Club', 'description' => 'Debates and public speaking'],
        ];
        foreach ($clubs as $c) {
            DB::table('clubs')->insert([
                'club_name' => $c['club_name'],
                'description' => $c['description'],
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $this->command->info('Clubs created.');
    }
}
