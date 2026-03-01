<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackagesSeeder extends Seeder
{
    /**
     * Create default subscription packages for landing page and superadmin.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('packages')->exists()) {
            $this->command->info('Packages already exist.');
            return;
        }

        $packages = [
            [
                'name' => 'Starter',
                'price' => '29',
                'package_type' => 'school',
                'interval' => 'Monthly',
                'days' => 30,
                'studentLimit' => '50',
                'features' => json_encode([
                    'Student Management',
                    'Teacher Management',
                    'Attendance',
                    'Examinations',
                    'Reports',
                ]),
                'status' => 1,
                'description' => 'Best for small schools getting started.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Professional',
                'price' => '79',
                'package_type' => 'school',
                'interval' => 'Monthly',
                'days' => 30,
                'studentLimit' => '200',
                'features' => json_encode([
                    'Everything in Starter',
                    'Library Management',
                    'Hostel Management',
                    'Accounting',
                    'Online Payments',
                ]),
                'status' => 1,
                'description' => 'For growing schools with more needs.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Enterprise',
                'price' => '199',
                'package_type' => 'school',
                'interval' => 'Monthly',
                'days' => 30,
                'studentLimit' => 'Unlimited',
                'features' => json_encode([
                    'Everything in Professional',
                    'Unlimited Students',
                    'Priority Support',
                    'Custom Reports',
                    'API Access',
                ]),
                'status' => 1,
                'description' => 'For large institutions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Yearly Professional',
                'price' => '790',
                'package_type' => 'school',
                'interval' => 'Yearly',
                'days' => 365,
                'studentLimit' => '200',
                'features' => json_encode([
                    'Everything in Professional',
                    '2 months FREE',
                    'Best value',
                ]),
                'status' => 1,
                'description' => 'Save 17% with yearly billing.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('packages')->insert($packages);
        $this->command->info('Default packages created.');
    }
}
