<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HostelsSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('hostels')->exists()) return;

        DB::table('hostels')->insert([
            [
                'school_id' => 1,
                'name' => 'Boys Hostel',
                'type' => 'boys',
                'address' => 'Campus Block A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'school_id' => 1,
                'name' => 'Girls Hostel',
                'type' => 'girls',
                'address' => 'Campus Block B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        $this->command->info('Hostels created.');

        // Hostel rooms
        if (!DB::table('hostel_rooms')->exists()) {
            foreach ([1, 2] as $hostelId) {
                for ($i = 1; $i <= 5; $i++) {
                    DB::table('hostel_rooms')->insert([
                        'school_id' => 1,
                        'hostel_id' => $hostelId,
                        'room_no' => 'R' . str_pad($i, 2, '0', STR_PAD_LEFT),
                        'capacity' => 4,
                        'occupied' => 0,
                        'seat_fee' => 5000,
                        'status' => 'active',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            $this->command->info('Hostel rooms created.');
        }
    }
}
