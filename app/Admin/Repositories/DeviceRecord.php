<?php

namespace App\Admin\Repositories;

use App\Models\ColumnSort;
use App\Models\DeviceRecord as Model;
use Dcat\Admin\Repositories\EloquentRepository;
use Illuminate\Support\Facades\Schema;

class DeviceRecord extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    public function toTree(): array
    {
        $array = [];
        $model = new Model();
        $table_name = $model->getTable();
        // 排序表实中存在的字段
        $model_columns_array = ColumnSort::where('table_name', $table_name)
            ->orderBy('order', 'ASC')
            ->get(['field', 'order'])
            ->toArray();
        $model_columns = [];

        foreach ($model_columns_array as $model_column) {
            $model_columns = array_merge($model_columns, [$model_column['order'] => $model_column['field']]);
        }
//        dd($model_columns_array, $model_columns);
        // 如果column_sorts表内没有该资产的字段排序数据，则全部新建
        // 数据库实际存在的字段+代码中自定义的字段
        $needle_columns = $this->sortNeedleColumns();
//        dd($needle_columns);
        if (!empty($model_columns)) {
            // 排序表中没有，但实际需要排序的字段
            $not_in_needle_columns = array_diff($needle_columns, $model_columns);
            $needle_columns = array_merge($model_columns, $not_in_needle_columns);
        }
        foreach ($needle_columns as $key => $needle_column) {
            $model = new Model();
            $model->id = $key;
            $model->title = admin_trans_field($needle_column);
            $model->parent_id = 0;
            $model->order = $key;
            array_push($array, $model);
        }
        usort($array, function ($a, $b) {
            return $a->order < $b->order ? -1 : 1;
        });

        return $array;
    }

    public function sortNeedleColumns(): array
    {
        $table_name = $this->getTable();
        $needle_columns = Schema::getColumnListing($table_name);
        $needle_columns = array_merge($needle_columns, $this->getModel()->sortIncludeColumns);
        $needle_columns = array_values(array_diff($needle_columns, $this->getModel()->sortExceptColumns));
        $array = [];
        $return = [];
        foreach ($needle_columns as $key => $needle_column) {
            $column_sort = ColumnSort::where('table_name', $table_name)
                ->where('field', $needle_column)
                ->first();
            // 如果排序表中已经有这个字段了
            if (!empty($column_sort)) {
                // 往全部需要排序的字段中，指定位置，插入，排序的字段
                array_push($array, ['field' => $column_sort->field, 'order' => $column_sort->order]);
            } else {
                array_push($array, ['field' => $needle_column, 'order' => $key + 100]);
            }
        }
        $keys = array_column($array, 'order');
        array_multisort($keys, SORT_ASC, $array);
        foreach ($array as $item) {
            $return[$item['order']] = $item['field'];
        }
        $return = array_values($return);
        return $return;
    }

    public function getTable(): string
    {
        return $this->getModel()->getTable();
    }

    public function getModel(): Model
    {
        return new Model();
    }
}
