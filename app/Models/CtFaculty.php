<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class CtFaculty extends Model
{
    use SoftDeletes;

    public $table = 'ct_faculties';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'rank' => 'string',
        'administrative_title' => 'string',
        'school' => 'string',
        'school_code' => 'string',
        'department' => 'string',
        'department_code' => 'string',
        'campus_code' => 'string',
        'sTEM' => 'boolean',
        'campus_phone' => 'string',
        'contact_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contact_id' => 'required'
    ];



	/**
	 * Relationships
	 */

	public function contact()
	{
		return $this->belongsTo('App\Models\CtContact', 'contact_id');
	}
}
