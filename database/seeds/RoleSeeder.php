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
            [ 'name' => 'administrator', 'guard_name' => 'workers' ],
            [ 'name' => 'user', 'guard_name' => 'workers' ],

            # Estudiantes
            [ 'name' => 'administrator', 'guard_name' => 'students' ],
            [ 'name' => 'user', 'guard_name' => 'students' ],

            # Usuario
            [ 'name' => 'user' ],
        ];

        foreach ( $roles as $role)
            Role::create($role);
    }
}
