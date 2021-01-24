<?php

namespace Celaraze\Chemex\Part\Repositories;

use Celaraze\Chemex\Part\Models\PartCategory as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class PartCategory extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
