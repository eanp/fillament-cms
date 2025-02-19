<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role as SpatieRole;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = ['Admin', 'Writer', 'Drafter'];

        foreach ($roles as $role) {
            SpatieRole::create([
                'name' => $role,
                'guard_name' => 'web' // This is required by Spatie Permission
            ]);
        }
    }
}
