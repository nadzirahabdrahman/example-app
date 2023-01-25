<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClassController extends Controller
{
    //ClassRoom nama MODEL
    public function index() {

        //Lazy loading: sebanyak 5 kali query
        //select * from class
        //select * from students where class = 1A/1B/1C/1D
        // $class = ClassRoom::all(); 

        //Eager loading:2 kali shj query
        //select * from class
        //select * from students where class in 1A,1B,1C,1D
        //parameter dalam with(): function dalam MODEL
        // $class = ClassRoom::with('students', 'homeroomTeacher')->get(); //select * from students where class
        $class = ClassRoom::get();
        //classList is a variable in MODEL to send the data to VIEW. 
        return view('classroom', ['classList' => $class]);
    }

    public function show($id)
    {
        //with() parameter mesti nama FUNCTION dlm CLASSROOM MODEL (nama relationship)
        $class = ClassRoom::with(['students', 'homeroomTeacher'])
        ->findOrFail($id);
        //classList is a variable in MODEL to send the data to VIEW. 
        return view('class-detail', ['class' => $class]);
    }

    //utk button ADD NEW CLASS & fetch data dr relationship TEACHER TABLE
    public function create()
    {

        $teacher = Teacher::select('id', 'name')->get(); // fetch id & name from TEACHER TABLE
        return view('class-add', ['teacher' => $teacher]);
    }

    //Request-> utk fetch user input drpd form
    public function store(Request $request)
    {
        
        $class = ClassRoom::create($request->all());
        //terus direct ke page CLASS
        return redirect('/class');
    }

    public function edit(Request $request, $id)
    {
        //with()->nama function relationship dlm CLASSROOM MODEL
        $class = ClassRoom::with('homeroomTeacher')->findOrFail($id);
        $teacher = Teacher::where('id', '!=', $class->teacher_id)->get(['id','name']);
        return view('class-edit', ['class' => $class, 'teacher' => $teacher]);
    }

    public function update(Request $request, $id)
    {
        $class = ClassRoom::findOrFail($id);

        //With MASS ASSIGNMENT
        $class->update($request->all());
        return redirect('/class');

        
    }

    public function delete($id)
    {
        $class = ClassRoom::findOrFail($id);
        return view('class-delete', ['class' => $class]);
    }

    public function destroy($id)
    {
        $deletedClass = ClassRoom::findOrFail($id);
        $deletedClass->delete();

        if ($deletedClass) {
            //display message
            Session::flash('status', 'Success');
            Session::flash('message', 'A class has been deleted');
        }

        return redirect('/class');
    }
    
}
