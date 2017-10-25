<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class CtStudent extends Model
{
    use SoftDeletes;

    public $table = 'ct_students';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'contact_id',
        'school',
        'academic_career',
        'academic_standing',
        'ethnicity'
    ];


    public $import_fields = [
        'school',
        'academic_career',
        'academic_standing',
        'ethnicity'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'contact_id' => 'integer',
        'school' => 'string',
        'academic_career' => 'string',
        'academic_standing' => 'string',
        'ethnicity' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contact.first_name' => 'required',
        'contact.last_name' => 'required',
        'contact.email' => 'required|email',
        'contact.gender' => 'required',
        'contact.join_date' => 'required|date',
        'contact.iu_username' => 'required',
        'school' => 'required',
        'ethnicity' => 'required',
    ];

	/**
	 * Relationships
	 */

	public function contact()
	{
		return $this->belongsTo('App\Models\CtContact', 'contact_id');
	}

	public function majors()
	{
		return $this->belongsToMany('App\Models\CtMajor', 'ct_student_majors', 'student_id', 'major_id');
	}
}
