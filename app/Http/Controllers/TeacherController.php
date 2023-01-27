<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    public function index(Request $request) {

        //class: function name dalam MODEL
        $keyword = $request->keyword;
        $teacher = Teacher::where('name', 'LIKE', '%'.$keyword.'%')
        ->simplePaginate(10);
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
        $newname = '';

        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('photo')->storeAs('photo-teacher', $newName);
        }

        $request['image'] = $newName;
        
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

    public function delete($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teacher-delete', ['teacher' => $teacher]);
    }

    public function destroy($id)
    {
        $deletedTeacher = Teacher::findOrFail($id);
        $deletedTeacher->delete();

        if ($deletedTeacher) {
            //display message
            Session::flash('status', 'Success');
            Session::flash('message', 'A teacher has been deleted');
        }

        return redirect('/teacher');
    }

    //untuk view DELETED TEACHER
    public function deletedTeacher()
    {
        $deletedTeacher = Teacher::onlyTrashed()->get();
        return view('teacher-deleted-list', ['teacher' => $deletedTeacher]);
    }

    //untuk RESTORE DATA from DB
    public function restore($id)
    {
        $deletedTeacher = Teacher::withTrashed()->where('id', $id)->restore();

        if ($deletedTeacher) {
            //display alert message
            Session::flash('status', 'Success');
            Session::flash('message', 'A teacher has been restored');
        }

        return redirect('/teacher');
    }
}
