<?php

namespace Celaraze\Chemex\Software\Repositories;

use Celaraze\Chemex\Software\Models\SoftwareRecord as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class SoftwareRecord extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
