<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index() {

        //class: function name dalam MODEL
        $teacher = Teacher::all();
        //teacherList is a variable in MODEL to send the data to VIEW. 
        return view('teacher', ['teacherList' => $teacher]);
    }

    public function show($id)
    {
        //class: function name dalam MODEL
        $teacher = Teacher::with('class.students')
        ->findOrFail($id);
        //teacherList is a variable in MODEL to send the data to VIEW. 
        return view('teacher-detail', ['teacher' => $teacher]);
    }
}
