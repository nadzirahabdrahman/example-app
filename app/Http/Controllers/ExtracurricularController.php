<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracurricular;

class ExtracurricularController extends Controller
{
    public function index() {

        // $ekskul = Extracurricular::with('students')->get();
        $ekskul = Extracurricular::get();
        //ekskulList is a variable in MODEL to send the data to VIEW. 
        return view('extracurricular', ['ekskulList' => $ekskul]);
    }

    public function show($id)
    {
        //with() parameter mesti nama FUNCTION dlm CLASSROOM MODEL (nama relationship)
        $ekskul = Extracurricular::with('students')->
        findOrFail($id);
        //classList is a variable in MODEL to send the data to VIEW. 
        return view('extracurricular-detail', ['ekskul' => $ekskul]);
    }
}
