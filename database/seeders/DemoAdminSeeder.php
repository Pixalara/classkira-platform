<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoAdminSeeder extends Seeder
{
    public function run()
    {
        if (User::where('email', 'admin@demoschool.com')->exists()) return;

        $info = [
            'gender' => 'Male',
            'blood_group' => 'a+',
            'birthday' => time(),
            'phone' => '+1234567890',
            'address' => '123 Education Street',
            'photo' => 'user.png',
        ];

        User::create([
            'name' => 'School Admin',
            'email' => 'admin@demoschool.com',
            'password' => Hash::make('password'),
            'role_id' => '2',
            'school_id' => 1,
            'user_information' => json_encode($info),
            'status' => 1,
        ]);
        $this->command->info('Demo school admin created (admin@demoschool.com / password).');
    }
}
