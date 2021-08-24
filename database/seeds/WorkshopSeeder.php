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
                'name' => 'curso sostenibilidad',
                'description' => 'Conferencia: Sostenibilidad energética en la pandemia',
                'type' => 'Curso',
            ],
            [ 
                'name' => 'curso movilidad y urbanismo',
                'description' => 'Conferencia: Movilidad y Urbanismo con enfoque de género',
                'type' => 'Curso',
            ],
            [
                'name' => 'curso conduce con100te',
                'description' => 'Curso-taller: Conduce Con💯te',
                'type' => 'Curso',
            ], 
            [ 
                'name' => 'curso mus-uaslp',
                'description' => 'Segunda mesa de trabajo MUS-UASLP',
                'type' => 'Curso'
            ],
            [
                'name' => 'curso cebratón y proyecto mus-zup',
                'description' => 'Curso-taller: Intervenciones y reordenamiento: Cebratón y Proyecto MUS-ZUP',
                'type' => 'Curso',
            ]
        ];

        foreach ($workshops as $workshop)
            Workshop::create($workshop);
    }
}
