<?php

use Illuminate\Database\Seeder;
use App\Models\Workshop;
use Carbon\Carbon;

class CursosActualizacion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $wss = [
            [
                'id' => 40,
                'name' => 'Desarrollos regionales y de economía',
                'description' => 'Desarrollos regionales y de economía',
                'type' => 'curso',
                'start_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 41,
                'name' => 'Ecología urbana y paisaje',
                'description' => 'Ecología urbana y paisaje',
                'type' => 'curso',
                'start_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 42,
                'name' => 'Gobernanza y participación',
                'description' => 'Gobernanza y participación',
                'type' => 'curso',
                'start_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 43,
                'name' => 'Temas selectos contaminación del aire',
                'description' => 'Temas selectos contaminación del aire',
                'type' => 'curso',
                'start_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        /*
        $wss = [
            [
                'id' => 16,
                'name' => 'Recursos ecónomicos y de gestión para la sostenibilidad',
                'description' => 'Recursos ecónomicos y de gestión para la sostenibilidad',
                'type' => 'curso',
                'start_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 17,
                'name' => 'Reglamento e instituciones ambientales',
                'description' => 'Sistema de ciudad y metabolismo urbano',
                'type' => 'curso',
                'start_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 18,
                'name' => 'Sistema de ciudad y metabolismo urbano',
                'description' => 'Sistema de ciudad y metabolismo urbano',
                'type' => 'curso',
                'start_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            
        ];*/

        foreach ($wss as $ws)
            Workshop::create($ws);
    }
}
