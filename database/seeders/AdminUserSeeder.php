<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Create default superadmin user if not exists.
     *
     * @return void
     */
    public function run()
    {
        if (User::where('role_id', '1')->exists()) {
            $this->command->info('Superadmin user already exists.');
            return;
        }

        $info = [
            'gender' => 'Male',
            'blood_group' => 'a+',
            'birthday' => time(),
            'phone' => env('ADMIN_PHONE', ''),
            'address' => env('ADMIN_ADDRESS', ''),
            'photo' => 'user.png',
        ];

        User::create([
            'name' => env('ADMIN_NAME', 'Superadmin'),
            'email' => env('ADMIN_EMAIL', 'admin@classkira.com'),
            'password' => Hash::make(env('ADMIN_PASSWORD', 'password')),
            'role_id' => '1',
            'user_information' => json_encode($info),
            'status' => 1,
        ]);

        $this->command->info('Superadmin user created.');
    }
}
