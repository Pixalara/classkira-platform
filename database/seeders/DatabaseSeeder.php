<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            InstallSqlSeeder::class,
            SessionSeeder::class,
            RolesSeeder::class,
            SchoolsSeeder::class,
            AdminUserSeeder::class,
            DemoAdminSeeder::class,
            PackagesSeeder::class,
            FrontendFeaturesSeeder::class,
            ClassesSeeder::class,
            SectionsSeeder::class,
            ClassRoomsSeeder::class,
            DepartmentsSeeder::class,
            SubjectsSeeder::class,
            ExamCategoriesSeeder::class,
            ExpenseCategoriesSeeder::class,
            GradesSeeder::class,
            AdmitCardsSeeder::class,
            HostelsSeeder::class,
            ClubsSeeder::class,
            NoticeboardSeeder::class,
            DemoUsersSeeder::class,
        ]);
    }
}
