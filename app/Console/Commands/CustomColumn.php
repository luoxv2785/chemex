<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CustomColumn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chemex:custom-column';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '从自定义字段表中恢复自定义字段';

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
        $custom_columns = \App\Models\CustomColumn::all();
        foreach ($custom_columns as $custom_column) {
            try {
                Schema::table($custom_column->table_name, function (Blueprint $table) use ($custom_column) {
                    $type = $custom_column->type;
                    if ($custom_column->is_nullable == 0) {
                        $nullable = false;
                    } else {
                        $nullable = true;
                    }
                    if ($type == 'date' || $type == 'dateTime') {
                        $nullable = true;
                    }
                    if ($type == 'select') {
                        $type = 'string';
                    }
                    $table->$type($custom_column->name)->nullable($nullable);
                });
            } catch (Exception $exception) {
                DB::rollBack();
            }
        }
        $this->info('自定义字段处理完成！');

        return 0;
    }
}
