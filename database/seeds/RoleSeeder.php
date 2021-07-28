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
            [ 'name' => 'administrador' ],

            # Usuario
            [ 'name' => 'user' ],
        ];

        foreach ( $roles as $role)
            Role::create($role);
    }
}
