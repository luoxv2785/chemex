<?php

namespace App\Admin\Repositories;

use App\Models\TodoRecord as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class TodoRecord extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
