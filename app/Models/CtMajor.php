<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class CtMajor extends Model
{
    use SoftDeletes;

    public $table = 'ct_majors';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'major',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'major' => 'string',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'major' => 'required'
    ];

	/**
	 * Relationships
	 */

	public function students()
	{
		return $this->belongsToMany('App\Models\CtStudent', 'ct_student_majors', 'major_id', 'student_id');
	}
}
