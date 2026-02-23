<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\grade;

class grade extends Model
{
    use HasFactory;

    protected $table = 'grades';

    protected $fillable = [
        'grade_level',
        'grade_adviser'
    ];
    //an grade has many categories
    public function Student()
    {
        return $this->hasMany(Student::class);
    }
}
