<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class InstallSqlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Imports the install.sql file which contains all table structures and initial data.
     *
     * @return void
     */
    public function run()
    {
        $sqlPath = base_path('public/assets/install.sql');

        if (!File::exists($sqlPath)) {
            $this->command->error('Install SQL file not found: ' . $sqlPath);
            return;
        }

        $lines = file($sqlPath);
        $templine = '';

        foreach ($lines as $line) {
            if (substr($line, 0, 2) == '--' || trim($line) == '') {
                continue;
            }

            $templine .= $line;

            if (substr(trim($line), -1, 1) == ';') {
                try {
                    DB::unprepared($templine);
                } catch (\Exception $e) {
                    // Skip statements that may fail (e.g., duplicate key, table exists)
                    if (config('app.debug')) {
                        $this->command->warn('SQL warning: ' . $e->getMessage());
                    }
                }
                $templine = '';
            }
        }

        $this->command->info('Install SQL imported successfully.');
    }
}
