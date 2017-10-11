<?php

namespace App\Repositories;

use App\Models\CtStudentMajor;
use InfyOm\Generator\Common\BaseRepository;

class CtStudentMajorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'student_id',
        'major_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CtStudentMajor::class;
    }
}
