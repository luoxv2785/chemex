<?php

namespace App\Admin\Repositories;

use App\Models\LendTrack as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class LendTrack extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
