<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrontendFeaturesSeeder extends Seeder
{
    /**
     * Create default frontend features for landing page.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('frontend_features')->exists()) {
            $this->command->info('Frontend features already exist.');
            return;
        }

        $features = [
            [
                'title' => 'Student Management',
                'description' => 'Manage students, enrollments, and academic records with ease.',
                'icon' => 'fa-solid fa-user-graduate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Attendance Tracking',
                'description' => 'Track daily attendance for students and teachers automatically.',
                'icon' => 'fa-solid fa-clipboard-check',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Examination System',
                'description' => 'Create exams, admit cards, gradebooks, and generate reports.',
                'icon' => 'fa-solid fa-file-lines',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fee Management',
                'description' => 'Manage fees, invoices, and payments with multiple gateways.',
                'icon' => 'fa-solid fa-money-bill-wave',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Library Management',
                'description' => 'Catalog books, manage issues, and track returns.',
                'icon' => 'fa-solid fa-book',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Hostel & Transport',
                'description' => 'Manage hostels, rooms, and transport for students.',
                'icon' => 'fa-solid fa-building',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Reports & Analytics',
                'description' => 'Generate detailed reports and insights for decision making.',
                'icon' => 'fa-solid fa-chart-line',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Multi-School Support',
                'description' => 'Manage multiple schools from a single superadmin panel.',
                'icon' => 'fa-solid fa-school',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('frontend_features')->insert($features);
        $this->command->info('Default frontend features created.');
    }
}
