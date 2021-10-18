<?php

use Illuminate\Database\Seeder;
use App\Models\ejes;
class EjesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Ejes = [
            [ 
                'name' => 'Educación'
            ],
            [ 
                'name' => 'Gestión ambiental'
             
            ],
            [
                'name' => 'Vinculación'
              
            ], 
            [ 
                'name' => 'Administración'
            ],
            [
                'name' => 'Comunicación'
            ]
           
        ];

        foreach ($Ejes as $Eje)
            ejes::create($Ejes);

    }
}
