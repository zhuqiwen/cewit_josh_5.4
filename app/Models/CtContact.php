<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class CtContact extends Model
{
    use SoftDeletes;

    public $table = 'ct_contacts';


    protected $dates = ['deleted_at'];


    public $fillable = [
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

    public $import_fields = [
        'first_name',
        'last_name',
        'email',
        'iu_username',
        'gender',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'iu_username' => 'string',
        'gender' => 'string',
        'is_active' => 'boolean',
        'is_affiliate' => 'boolean',
        'is_test' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'email',
        'join_date' => 'date',
        'is_active' => 'boolean',
        'is_affiliate' => 'boolean',
        'is_test' => 'boolean'
    ];


	/**
	 * Relationships
	 */


	public function student()
	{
		return $this->hasOne('App\Models\CtStudent', 'contact_id');
	}

	public function faculty()
	{
		return $this->hasOne('App\Models\CtFaculty', 'contact_id');
	}

}
