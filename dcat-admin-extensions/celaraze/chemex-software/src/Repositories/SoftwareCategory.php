<?php

namespace Celaraze\Chemex\Software\Repositories;

use Celaraze\Chemex\Software\Models\SoftwareCategory as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class SoftwareCategory extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
