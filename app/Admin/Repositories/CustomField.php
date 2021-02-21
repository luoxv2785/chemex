<?php

namespace App\Admin\Repositories;

use App\Models\CustomField as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class CustomField extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
