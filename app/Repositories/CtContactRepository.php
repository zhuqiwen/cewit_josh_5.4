<?php

namespace App\Repositories;

use App\Models\CtContact;
use InfyOm\Generator\Common\BaseRepository;

class CtContactRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'email',
        'iu_username',
        'gender',
        'join_date',
        'is_active',
        'is_affiliate',
        'is_test'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CtContact::class;
    }
}
