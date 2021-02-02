<?php

namespace Celaraze\Chemex\Consumable\Repositories;

use Celaraze\Chemex\Consumable\Models\ConsumableRecord as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ConsumableRecord extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
