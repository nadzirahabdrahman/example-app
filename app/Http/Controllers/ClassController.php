<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassRoom;

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
}
