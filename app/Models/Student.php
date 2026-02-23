<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\grade;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'student_familyname',
        'student_firstname',
        'grade_id'
    ];

    // each Student belongs to an grade
    public function grade()
    {
        return $this->belongsTo(grade::class,'grade_id');
    }
}
