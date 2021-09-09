<?php

namespace App\Console;

use App\Models\Auth\Student;
use App\Models\Workshop;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /*
        $schedule->call(function () {

            $user = Student::find(262698);
            $workshop = Workshop::firstWhere('name', 'curso movilidad y urbanismo');

            $user->workshops()->updateExistingPivot($workshop->id, [
                'sent' => true,
                'sent_at' =>
            ])

        })->everyMinute();*/


        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
