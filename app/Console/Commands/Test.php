<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

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
        $content = file_get_contents(admin_path('routes.php'));
        preg_match_all("/^(.*resource.*)$/mi", $content, $results);
        $routes = $results[1];
        foreach ($routes as $route) {
            dd($route);
        }
        dd($routes);
        return 0;
    }
}
