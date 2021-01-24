<?php

namespace Celaraze\Chemex\Service\Repositories;

use Celaraze\Chemex\Service\Models\ServiceRecord as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ServiceRecord extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
