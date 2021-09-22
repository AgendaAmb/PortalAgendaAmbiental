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
        $user = User::find(262698);

        Mail::mailer('smtp_unirodada')->to($user)->send(new GestionEmail);

        return 0;
    }
}
