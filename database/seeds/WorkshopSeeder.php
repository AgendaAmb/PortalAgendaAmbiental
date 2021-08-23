<?php

use App\Models\Workshop;
use Illuminate\Database\Seeder;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workshops = [
            [ 
                'name' => 'Curso-taller: Conduce Con💯te',
                'type' => 'Curso',
            ],
            [ 
                'name' => 'Sostenibilidad energética en la pandemia',
                'type' => 'Curso',
            ],
            [
                'name' => 'Movilidad y Urbanismo con enfoque de género',
                'type' => 'Curso',
            ], 
            [ 
                'name' => '2nda Mesa de Trabajo MUS-UASLP',
                'type' => 'Curso'
            ],
            [
                'name' => 'Intervenciones y reordenamiento: Cebratón y Proyecto MUS-ZUP',
                'type' => 'Curso',
            ]
        ];

        foreach ($workshops as $workshop)
            Workshop::create($workshop);
    }
}
