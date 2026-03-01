<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticeboardSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('noticeboard')->exists()) return;

        DB::table('noticeboard')->insert([
            [
                'notice_title' => 'Welcome Notice',
                'notice' => 'Welcome to the new academic session. Please check the noticeboard regularly for updates.',
                'start_date' => date('Y-m-d'),
                'start_time' => '09:00',
                'end_date' => date('Y-m-d', strtotime('+1 month')),
                'end_time' => '17:00',
                'status' => 1,
                'show_on_website' => 1,
                'school_id' => 1,
                'session_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        $this->command->info('Noticeboard sample created.');
    }
}
