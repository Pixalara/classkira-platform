<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionSeeder extends Seeder
{
    /**
     * Create default academic session required by global_settings.running_session.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('sessions')->where('id', 1)->exists()) {
            return;
        }

        DB::table('sessions')->insert([
            'id' => 1,
            'session_title' => date('Y'),
            'status' => 1,
            'school_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->command->info('Default session created.');
    }
}
