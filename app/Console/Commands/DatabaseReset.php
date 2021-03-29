<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DatabaseReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chemex:db-reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '重置数据库';

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
    public function handle(): int
    {
        $this->info('正在重置数据库：');
        $db_name = config('database.connections.mysql.database');
        DB::select('drop database ' . $db_name);
        DB::select('create database ' . $db_name);
        $this->info('重置完成！');

        return 0;
    }
}
