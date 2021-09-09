<?php

use App\Mail\RegisteredToMMUSConference;
use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\Worker;
use App\Models\Module;
use App\Models\Workshop;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
