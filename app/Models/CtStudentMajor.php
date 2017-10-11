<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class CtStudentMajor extends Model
{
    use SoftDeletes;

    public $table = 'ct_student_majors';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'student_id',
        'major_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'student_id' => 'integer',
        'major_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'student_id' => 'integer',
        'major_id' => 'integer'
    ];
}
