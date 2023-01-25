<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //many to many: many extracurricular for many students
    public function students()
    {
        //student_extracurricular: pivot table (student X extracurricular)
        //extracurricular_id: FK dlm student_extracurricular (PK dlm extracurriculars table)
        //student_id: FK dlm student_extracurricular (PK dlm students table)
        return $this->belongsToMany(Student::class, 'student_extracurricular', 
        'extracurricular_id', 'student_id');
    }
}
