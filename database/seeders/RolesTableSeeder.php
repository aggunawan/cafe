<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Orchid\Platform\Models\Role;

class RolesTableSeeder extends Seeder
{
    /** @noinspection PhpUndefinedFieldInspection */
    public function run()
    {
        if (!Role::query()->where('slug', 'administrator')->exists()) {
            $role = new Role();
            $role->slug = 'administrator';
            $role->name = 'Administrator';
            $role->permissions = [
                "platform.index" => true,
                "platform.app.dishes" => true,
                "platform.app.orders" => true,
                "platform.app.payments" => true,
                "platform.systems.roles" => true,
                "platform.systems.users" => true,
                "platform.app.categories" => true,
                "platform.systems.attachment" => true
            ];
            $role->save();
        }

        if (!Role::query()->where('slug', 'cashier')->exists()) {
            $role = new Role();
            $role->slug = 'cashier';
            $role->name = 'Cashier';
            $role->permissions = [
                "platform.index" => true,
                "platform.app.dishes" => false,
                "platform.app.orders" => true,
                "platform.app.payments" => true,
                "platform.systems.roles" => false,
                "platform.systems.users" => false,
                "platform.app.categories" => false,
                "platform.systems.attachment" => false
            ];
            $role->save();
        }

        if (!Role::query()->where('slug', 'chef')->exists()) {
            $role = new Role();
            $role->slug = 'chef';
            $role->name = 'Chef';
            $role->permissions = [
                "platform.index" => true,
                "platform.app.dishes" => false,
                "platform.app.orders" => true,
                "platform.app.payments" => false,
                "platform.systems.roles" => false,
                "platform.systems.users" => false,
                "platform.app.categories" => false,
                "platform.systems.attachment" => false
            ];
            $role->save();
        }
    }
}
