<?php

namespace App\Admin\Repositories;

use App\Models\ApprovalTrack as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ApprovalTrack extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
