<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    //MASS ASSIGNMENT = refer STUDENT CONTROLLER
    //untuk elak DATA yang sama dlm table DB
    protected $fillable = [
        'name', 'gender', 'nis', 'class_id', 'image'
    ];

    //many to one: MANY students in ONE CLASS
    public function class()
    {
        //ClassRoom as in MODEL name
        return $this->belongsTo(ClassRoom::class);

    }

    //many to many: many students in many EXTRACURRICULAR class
    public function extracurriculars()
    {
        return $this->belongsToMany(Extracurricular::class, 'student_extracurricular', 'student_id', 
        'extracurricular_id');
    }
}
