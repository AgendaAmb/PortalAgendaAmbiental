<?php

use App\Models\Workshop;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWorkshopsRows extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $workshops = [
            [ 
                'name' => 'curso sostenibilidad',
                'description' => 'Conferencia 1: Sostenibilidad energética en la pandemia',
            ],
            [ 
                'name' => 'curso movilidad y urbanismo',
                'description' => 'Conferencia 2: Movilidad y Urbanismo con enfoque de género',
            ],
            [
                'name' => 'curso conduce con100te',
                'description' => 'Curso-taller: Conduce Con💯te',
            ], 
            [ 
                'name' => 'curso mus-uaslp',
                'description' => 'Mesa de trabajo: MUS-UASLP',
            ],
            [
                'name' => 'curso cebratón y proyecto mus-zup',
                'description' => 'Curso: Cebratón y Proyecto MUS-ZUP',
            ],
            [
                'name' => 'Unirodada cicloturística a la Cañada del Lobo',
                'description' => 'Unirodada cicloturística a la Cañada del Lobo',
            ]
        ];

        foreach ($workshops as $workshop)
            Workshop::where('name', $workshop['name'])->update([ 'description' => $workshop['description'] ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $workshops = [
            [ 
                'name' => 'curso sostenibilidad',
                'description' => 'Conferencia: Sostenibilidad energética en la pandemia',
            ],
            [ 
                'name' => 'curso movilidad y urbanismo',
                'description' => 'Conferencia: Movilidad y Urbanismo con enfoque de género',
            ],
            [
                'name' => 'curso conduce con100te',
                'description' => 'Curso-taller: Conduce Con💯te',
            ], 
            [ 
                'name' => 'curso mus-uaslp',
                'description' => 'Segunda mesa de trabajo MUS-UASLP',
            ],
            [
                'name' => 'curso cebratón y proyecto mus-zup',
                'description' => 'Curso-taller: Intervenciones y reordenamiento: Cebratón y Proyecto MUS-ZUP',
            ],
            [
                'name' => 'Unirodada cicloturística a la Cañada del Lobo',
                'description' => 'Unirodada cicloturística a la Cañada del Lobo',
            ]
        ];

        foreach ($workshops as $workshop)
            Workshop::where('name', $workshop['name'])->update([ 'description' => $workshop['description'] ]);
    }
}
