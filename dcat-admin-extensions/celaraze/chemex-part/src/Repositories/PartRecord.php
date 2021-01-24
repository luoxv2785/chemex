<?php

namespace Celaraze\Chemex\Part\Repositories;

use Celaraze\Chemex\Part\Models\PartRecord as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class PartRecord extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
