<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Ensure all required roles exist (including warden role_id 10).
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['role_id' => 10, 'name' => 'warden', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($roles as $role) {
            if (!DB::table('roles')->where('role_id', $role['role_id'])->exists()) {
                DB::table('roles')->insert($role);
                $this->command->info("Role '{$role['name']}' created (role_id: {$role['role_id']}).");
            }
        }
    }
}
