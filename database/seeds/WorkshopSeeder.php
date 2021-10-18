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
                'description' => 'Conferencia 1: Sostenibilidad energética en la pandemia',
                'type' => 'curso',
            ],
            [
                'name' => 'curso movilidad y urbanismo',
                'description' => 'Conferencia 2: Movilidad y Urbanismo con enfoque de género',
                'type' => 'curso',
            ],
            [
                'name' => 'curso conduce con100te',
                'description' => 'Curso-taller: Conduce Con💯te',
                'type' => 'curso',
            ],
            [
                'name' => 'curso mus-uaslp',
                'description' => 'Mesa de trabajo: MUS-UASLP',
                'type' => 'curso'
            ],
            [
                'name' => 'curso cebratón y proyecto mus-zup',
                'description' => 'Curso: Cebratón y Proyecto MUS-ZUP',
                'type' => 'curso',
            ],
            [
                'name' => 'Unirodada cicloturística a la Cañada del Lobo',
                'description' => 'Unirodada cicloturística a la Cañada del Lobo',
                'type' => 'unirodada',
            ]
        ];

        foreach ($workshops as $workshop)
            Workshop::create($workshop);
    }
}
