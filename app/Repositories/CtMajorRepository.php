<?php

namespace App\Repositories;

use App\Models\CtMajor;
use InfyOm\Generator\Common\BaseRepository;

class CtMajorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'major',
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CtMajor::class;
    }
}
