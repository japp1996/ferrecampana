<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:ferreteria_la_campana';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Respaldo de Base de Datos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->process = new Process(sprintf(
            'mysqldump -u%s -p%s %s > %s',
            config('database.connections.mysql.username'),
            config('database.connections.mysql.password'),
            config('database.connections.mysql.database'),
            storage_path('backups/backup.sql')
        ));
    }



    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $this->process->mustRun();
            return response()->json('text','El respaldo ha sido realizado exitosamente.');
        } catch (ProcessFailedException $exception) {
            return response()->json('text','El proceso de respaldo ha fallado.');
        }
    }
}
