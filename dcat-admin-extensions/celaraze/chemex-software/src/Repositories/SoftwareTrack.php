<?php

namespace Celaraze\Chemex\Software\Repositories;

use Celaraze\Chemex\Software\Models\SoftwareTrack as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class SoftwareTrack extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
