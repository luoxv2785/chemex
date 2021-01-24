<?php

namespace Celaraze\Chemex\Part\Repositories;

use Celaraze\Chemex\Part\Models\PartTrack as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class PartTrack extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
