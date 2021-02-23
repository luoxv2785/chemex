<?php

namespace App\Admin\Repositories;

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
        $return = [];
        $columns = Schema::getColumnListing('device_records');
        foreach ($columns as $key => $column) {
            $model = new Model();
            $model->id = $key;
            $model->title = admin_trans_field($column);
            $model->parent_id = 0;
            $model->order = $key;
            array_push($return, $model);
        }
        return $return;
    }
}
