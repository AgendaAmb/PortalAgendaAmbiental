<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            ModuleSeeder::class,
            PassportSeeder::class,
            RoleSeeder::class,
            //UserSeeder::class,
            WorkshopSeeder::class,
            EjesSeeder::class,
            CorreosSeeder::class,
        ]);
    }
}
