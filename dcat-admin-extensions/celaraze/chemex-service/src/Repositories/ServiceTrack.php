<?php

namespace Celaraze\Chemex\Service\Repositories;

use Celaraze\Chemex\Service\Models\ServiceTrack as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ServiceTrack extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
