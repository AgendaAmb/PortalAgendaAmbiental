<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DatabaseRestore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:restore'.
        ' {date : La fecha en la que se realizó el respaldo'.
        ' (backup) de la base de datos. La fecha debe de contener'.
        ' el siguiente formato: yyyy-mm-dd (año-mes-día)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Restaura la base de datos del portal,'.
        ' dada la fecha en la que'.
        ' se generó el respaldo';

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
        $filename = 'PortalAgendaAmbiental-backup-'.$this->argument('date').'.sql';

        $command = "mysql --user=".env('DB_USERNAME')." --password=".env('DB_PASSWORD') . " --host=".env('DB_HOST')." ".env('DB_DATABASE')." < " . storage_path() . "/app/backup/".$filename;
        $returnVar = null;
        $output  = null;

        exec($command, $output, $returnVar);
    }
}
