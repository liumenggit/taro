<?php

namespace App\Admin\Repositories;

use App\Models\ExamPaper as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ExamPaper extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
