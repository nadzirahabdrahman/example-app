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

    public function create()
    {
        return view('teacher-add');
    }

    public function store(Request $request)
    {
        $teacher = Teacher::create($request->all());
        return redirect('/teacher');
    }

    public function edit(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('teacher-edit', ['teacher' => $teacher]);
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        //With MASS ASSIGNMENT
        $teacher->update($request->all());
        return redirect('/teacher');
    }
}
