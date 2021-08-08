<?php

use App\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

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
            [ 'name' => '17 gemas', 'url' => env('APP_URL').'17Gemas' ],


            # Módulo de administración.
            [ 'name' => 'Administración', 'url' => route('Administracion') ],
        ];

        foreach ( $modules as $module)
        {
            $command = 'passport:client --name='.$module['name'].' --redirect_uri='.$module['url'].'/authorizeLogin';

            Module::create($module);
            Artisan::command($command, function(){})->getOutput();
        }

    }
}
