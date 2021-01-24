<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Update extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chemex:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '对Chemex进行升级操作';

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
        $this->call('migrate');
        $this->info('数据库迁移完成！');
        $this->call('db:seed', ['--class' => 'UpdateSeeder']);
        $this->info('升级完成！');
        return 0;
    }
}
