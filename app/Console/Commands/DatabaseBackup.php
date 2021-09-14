<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genera un respaldo de la base de datos';

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
        $filename = "PortalAgendaAmbiental-backup-".Carbon::now()->format('Y-m-d') .".sql";
        $command = "mysqldump --user=".env('DB_USERNAME')." --password=".env('DB_PASSWORD') . " --host=".env('DB_HOST')." ".env('DB_DATABASE')." > " . storage_path() . "/app/backup/".$filename;
        $returnVar = null;
        $output  = null;

        exec($command, $output, $returnVar);
    }
}
