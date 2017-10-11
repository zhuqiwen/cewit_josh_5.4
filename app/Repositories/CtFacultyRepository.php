<?php

namespace App\Repositories;

use App\Models\CtFaculty;
use InfyOm\Generator\Common\BaseRepository;

class CtFacultyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'rank',
        'administrative_title',
        'school',
        'school_code',
        'department',
        'department_code',
        'campus_code',
        'sTEM',
        'campus_phone',
        'contact_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CtFaculty::class;
    }
}
