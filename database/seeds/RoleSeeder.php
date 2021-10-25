<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            # Admin
            [ 'name' => 'administrator', 'guard_name' => 'web' ],

            # Coordinador
            [ 'name' => 'coordinator', 'guard_name' => 'web' ],

            # Ayudante
            [ 'name' => 'helper', 'guard_name' => 'web' ],

            # Usuario.
            [ 'name' => 'user', 'guard_name' => 'web' ],
        ];

        foreach ( $roles as $role)
            Role::firstOrCreate($role);
    }
}
