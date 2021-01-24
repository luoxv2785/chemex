<?php

namespace Celaraze\Chemex\Service\Repositories;

use Celaraze\Chemex\Service\Models\ServiceIssue as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ServiceIssue extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
