<?php

namespace Celaraze\Chemex\Consumable\Repositories;

use Celaraze\Chemex\Consumable\Models\ConsumableTrack as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ConsumableTrack extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

}
