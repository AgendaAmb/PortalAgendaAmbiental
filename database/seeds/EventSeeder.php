<?php

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'name' => 'Unirodada cicloturística a la Cañada del Lobo',
                'type' => 'unirodada'
            ],
        ];

        foreach ($events as $event)
            Event::create($event);
    }
}
