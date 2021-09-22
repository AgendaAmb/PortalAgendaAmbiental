<?php

namespace App\Console\Commands;

use App\Mail\Gestion\GestionEmail;
use App\Models\Auth\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EnvioCorreo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unirodada:sinpagar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::whereDoesntHave('roles', function($query){
            $query->whereIn('roles.name', ['administrator','coordinator']);
        })->whereHas('workshops', function($query){
            $query->where('type', 'unirodada')
                ->where('user_workshop.paid', false);
        })->whereNotNull('email_verified_at')->get()->each(function($user){

            dump($user->email);
                //Mail::mailer('smtp_unirodada')->to($user)->send(new GestionEmail);
        });

        dump($users->count());

        return 0;
    }
}
