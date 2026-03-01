<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DemoUsersSeeder extends Seeder
{
    public function run()
    {
        if (User::where('email', 'teacher@demoschool.com')->exists()) {
            $this->command->info('Demo teachers/parents/students already exist.');
            return;
        }

        $userInfo = [
            'gender' => 'Male',
            'blood_group' => 'a+',
            'birthday' => time(),
            'phone' => '+1234567890',
            'address' => '123 Education Street',
            'photo' => 'user.png',
        ];

        // Teachers
        $teachers = [
            ['name' => 'John Smith', 'email' => 'teacher@demoschool.com', 'department_id' => 1],
            ['name' => 'Jane Doe', 'email' => 'jane.teacher@demoschool.com', 'department_id' => 1],
        ];
        foreach ($teachers as $t) {
            User::create([
                'name' => $t['name'],
                'email' => $t['email'],
                'password' => Hash::make('password'),
                'role_id' => '3',
                'school_id' => 1,
                'department_id' => $t['department_id'] ?? null,
                'designation' => 'Teacher',
                'user_information' => json_encode($userInfo),
                'status' => 1,
            ]);
        }

        // Parents
        $parent1 = User::create([
            'name' => 'Robert Parent',
            'email' => 'parent@demoschool.com',
            'password' => Hash::make('password'),
            'role_id' => '6',
            'school_id' => 1,
            'user_information' => json_encode($userInfo),
            'status' => 1,
        ]);

        $parent2 = User::create([
            'name' => 'Mary Williams',
            'email' => 'mary.parent@demoschool.com',
            'password' => Hash::make('password'),
            'role_id' => '6',
            'school_id' => 1,
            'user_information' => json_encode(array_merge($userInfo, ['gender' => 'Female'])),
            'status' => 1,
        ]);

        // Students (with parent_id and enrollment)
        $studentInfo = json_encode(['blood_group' => 'a+', 'birthday' => time()]);

        $students = [
            ['name' => 'Alex Student', 'email' => 'student@demoschool.com', 'parent_id' => $parent1->id],
            ['name' => 'Emma Student', 'email' => 'emma.student@demoschool.com', 'parent_id' => $parent1->id],
            ['name' => 'Jack Student', 'email' => 'jack.student@demoschool.com', 'parent_id' => $parent2->id],
        ];

        foreach ($students as $s) {
            $student = User::create([
                'name' => $s['name'],
                'email' => $s['email'],
                'password' => Hash::make('password'),
                'role_id' => '7',
                'school_id' => 1,
                'parent_id' => $s['parent_id'],
                'user_information' => json_encode($userInfo),
                'student_info' => $studentInfo,
                'status' => 1,
            ]);

            DB::table('enrollments')->insert([
                'user_id' => $student->id,
                'class_id' => 1,
                'section_id' => 1,
                'school_id' => 1,
                'session_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Demo teachers, parents, and students created.');
    }
}
