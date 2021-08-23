<?php

use App\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

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
            UserSeeder::class,
            WorkshopSeeder::class,
        ]);
    }
}
