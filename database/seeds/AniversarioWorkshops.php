<?php

use App\Models\Module;
use App\Models\Workshop;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class AniversarioWorkshops extends Seeder
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
                'name' => 'Interculturalidad',
                'description' => 'Evento interculturalidad parte del 20 aniversario de PMPCA.',
                'type' => '20Aniversario',
                'start_date' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0'),
                'end_date' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0'),
                'created_at' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0')
            ],
            [
                'name' => 'Redacción y publicación',
                'description' => 'Evento de redacción y publicación de textos parte del 20 aniversario de PMPCA.',
                'type' => '20Aniversario',
                'start_date' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0'),
                'end_date' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0'),
                'created_at' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0')
            ],
            [
                'name' => 'Emprendidurismo',
                'description' => 'Evento de emprendidurismo parte del 20 aniversario de PMPCA.',
                'type' => '20Aniversario',
                'start_date' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0'),
                'end_date' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0'),
                'created_at' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0')
            ],
            [
                'name' => 'Cineclub',
                'description' => 'Evento cineclub parte del 20 aniversario de PMPCA.',
                'type' => '20Aniversario',
                'start_date' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0'),
                'end_date' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0'),
                'created_at' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0')
            ],
            [
                'name' => 'Unirodada',
                'description' => 'Unirodada parte del 20 aniversario de PMPCA.',
                'type' => '20Aniversario',
                'start_date' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0'),
                'end_date' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0'),
                'created_at' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H', '2022-07-20 0')
            ],
        ];


        // Modulo de 20 aniversario
        foreach ($workshops as $workshop)
            Workshop::create($workshop);

        $modulo = [
            'id' => 7,
            'name' => '20Aniversario',
            'url' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        Module::create($modulo);

    }
}
