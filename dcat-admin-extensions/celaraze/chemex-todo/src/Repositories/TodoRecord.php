<?php

namespace Celaraze\Chemex\Todo\Repositories;

use Celaraze\Chemex\Todo\Models\TodoRecord as Model;
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
