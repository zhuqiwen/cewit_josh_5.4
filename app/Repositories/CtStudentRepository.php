<?php

namespace App\Repositories;

use App\Models\CtStudent;
use InfyOm\Generator\Common\BaseRepository;

class CtStudentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contact_id',
        'school',
        'academic_career',
        'academic_standing',
        'ethnicity'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CtStudent::class;
    }
}
