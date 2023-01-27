<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\Session;

class ExtracurricularController extends Controller
{
    public function index(Request $request) {

        // $ekskul = Extracurricular::with('students')->get();

        $keyword = $request->keyword;
        $ekskul = Extracurricular::where('name', 'LIKE', '%'.$keyword.'%')
        ->simplePaginate(10);
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

    public function create()
    {
        return view('extracurricular-add');
    }

    public function store(Request $request)
    {
        $ekskul = Extracurricular::create($request->all());
        //terus direct ke page CLASS
        return redirect('/extracurricular');
    }

    public function edit(Request $request, $id)
    {
        
        $ekskul = Extracurricular::findOrFail($id);

        return view('extracurricular-edit', ['ekskul' => $ekskul]);
    }

    public function update(Request $request, $id)
    {
        $ekskul = Extracurricular::findOrFail($id);

        //With MASS ASSIGNMENT
        $ekskul->update($request->all());
        return redirect('/extracurricular');
    }

    public function delete($id)
    {
        $ekskul = Extracurricular::findOrFail($id);
        return view('extracurricular-delete', ['ekskul' => $ekskul]);
    }

    public function destroy($id)
    {
        $deletedEkskul = Extracurricular::findOrFail($id);
        $deletedEkskul->delete();

        if ($deletedEkskul) {
            //display message
            Session::flash('status', 'Success');
            Session::flash('message', 'An extracurricular has been deleted');
        }

        return redirect('/extracurricular');
    }

    //untuk view DELETED EXTRACURRICULAR
    public function deletedEkskul()
    {
        $deletedEkskul = Extracurricular::onlyTrashed()->get();
        return view('extracurricular-deleted-list', ['ekskul' => $deletedEkskul]);
    }

    //untuk RESTORE DATA from DB
    public function restore($id)
    {
        $deletedEkskul = Extracurricular::withTrashed()->where('id', $id)->restore();

        if ($deletedEkskul) {
            //display alert message
            Session::flash('status', 'Success');
            Session::flash('message', 'An extracurricular has been restored');
        }

        return redirect('/extracurricular');
    }
}
