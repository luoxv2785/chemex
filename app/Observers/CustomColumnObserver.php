<?php

namespace App\Observers;

use App\Models\ColumnSort;
use App\Models\CustomColumn;
use Exception;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CustomColumnObserver
{
    /**
     * Handle the CustomColumn "created" event.
     *
     * @param CustomColumn $customColumn
     *
     * @return void
     */
    public function created(CustomColumn $customColumn)
    {
        /**
         * 自定义字段创建后，同时触发数据库迁移
         * 对应的模型数据表就创建这个字段
         */
        try {
            Schema::table($customColumn->table_name, function (Blueprint $table) use ($customColumn) {
                $type = $customColumn->type;
                if ($customColumn->is_nullable == 0) {
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
                $table->$type($customColumn->name)->nullable($nullable);
            });
        } catch (Exception $exception) {
            DB::rollBack();
        }
    }

    /**
     * Handle the CustomColumn "updated" event.
     *
     * @param CustomColumn $customColumn
     *
     * @return void
     */
    public function updated(CustomColumn $customColumn)
    {
        $name = request('name');
        $new_name = request('new_name');
        // 自定义字段更新后，同时触发数据库迁移
        // 对应的模型数据表就更新这个字段
        try {
            Schema::table($customColumn->table_name, function (Blueprint $table) use ($customColumn, $name, $new_name) {
                $table->renameColumn($name, $new_name);
            });
        } catch (Exception $exception) {
            DB::rollBack();
        }

        // 排序表跟随
        $column_sort = ColumnSort::where('table_name', $customColumn->table_name)
            ->where('field', $name)
            ->first();
        if (!empty($column_sort)) {
            $column_sort->name = $new_name;
            $column_sort->save();
        }
    }

    /**
     * Handle the CustomColumn "deleted" event.
     *
     * @param CustomColumn $customColumn
     *
     * @return void
     */
    public function deleted(CustomColumn $customColumn)
    {
        // 自定义字段删除后，同时触发数据库迁移
        // 对应的模型数据表就删除这个字段
        try {
            Schema::table($customColumn->table_name, function (Blueprint $table) use ($customColumn) {
                $table->dropColumn($customColumn->name);
            });
        } catch (Exception $exception) {
            DB::rollBack();
        }

        // 排序表跟随
        $column_sort = ColumnSort::where('table_name', $customColumn->table_name)
            ->where('field', $customColumn->name)
            ->first();
        if (!empty($column_sort)) {
            $column_sort->delete();
        }
    }

    /**
     * Handle the CustomColumn "restored" event.
     *
     * @param CustomColumn $customColumn
     *
     * @return void
     */
    public function restored(CustomColumn $customColumn)
    {
        //
    }

    /**
     * Handle the CustomColumn "force deleted" event.
     *
     * @param CustomColumn $customColumn
     *
     * @return void
     */
    public function forceDeleted(CustomColumn $customColumn)
    {
        //
    }
}
