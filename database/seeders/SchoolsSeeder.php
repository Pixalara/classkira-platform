<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolsSeeder extends Seeder
{
    /**
     * Create default schools required for payment_methods (school_id 1, 2) and admin users.
     *
     * @return void
     */
    public function run()
    {
        $schools = [
            [
                'id' => 1,
                'title' => 'Demo School',
                'email' => 'school@classkira.com',
                'phone' => '+1234567890',
                'address' => '123 Education Street, City',
                'school_info' => 'A demonstration school for ClassKira.',
                'status' => 1,
                'running_session' => 1,
                'school_currency' => 'USD',
                'currency_position' => 'left-space',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Sample Academy',
                'email' => 'academy@classkira.com',
                'phone' => '+1234567891',
                'address' => '456 Learning Avenue, Town',
                'school_info' => 'Sample academy for testing.',
                'status' => 1,
                'running_session' => 1,
                'school_currency' => 'USD',
                'currency_position' => 'left-space',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($schools as $school) {
            if (!DB::table('schools')->where('id', $school['id'])->exists()) {
                DB::table('schools')->insert($school);
                $this->command->info("School '{$school['title']}' created (id: {$school['id']}).");
            }
        }
    }
}
