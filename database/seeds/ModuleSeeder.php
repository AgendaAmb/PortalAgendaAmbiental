<?php

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [

            # Módulo de biodiversidad.
            [ 'name' => 'Biodiversidad', 'url' => route('Gestion') ],

            # Módulo de control escolar.
            [ 'name' => 'Control Escolar', 'url' => route('Educacion') ],

            # Módulo de 17 gemas.
            [ 'name' => '17 gemas', 'url' => route('Gestion') ],


            # Módulo de administración.
            [ 'name' => 'Administración', 'url' => route('Administracion') ],
        ];

        foreach ( $modules as $module)
            Module::create($module);
    }
}
