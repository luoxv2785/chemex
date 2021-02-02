<?php

namespace Celaraze\Chemex\Consumable\Repositories;

use Celaraze\Chemex\Consumable\Models\ConsumableCategory as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ConsumableCategory extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
