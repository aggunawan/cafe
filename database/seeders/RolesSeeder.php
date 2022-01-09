<?php

namespace Database\Seeders;

use App\Enums\RoleSlugEnum;
use Illuminate\Database\Seeder;
use Orchid\Platform\Models\Role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        Role::query()->where('slug', RoleSlugEnum::ADMIN())->firstOrCreate([
            'name' => 'Administrator',
            'slug' => RoleSlugEnum::ADMIN(),
        ]);

        Role::query()->where('slug', RoleSlugEnum::CHEF())->firstOrCreate([
            'name' => 'Chef',
            'slug' => RoleSlugEnum::CHEF(),
        ]);
    }
}
