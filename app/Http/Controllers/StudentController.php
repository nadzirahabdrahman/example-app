<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentCreateRequest;

class StudentController extends Controller
{
    //
    public function index(Request $request) {

        // $student = Student::all(); //select * from students

        //Eager loading (Eloquent relationship)
        //class: function name dalam STUDENT MODEL
        //homeroomTeacher: function name dalam CLASSROOM MODEL
        //class.homeroomTeacher: 1. Panggil relationship STUDENT X CLASS 
        //                      2. Panggil relationship CLASS X TEACHER
        // $student = Student::with(['class.homeroomTeacher', 'extracurriculars'])->get();

        $keyword = $request->keyword;

        // $student = Student::get();
        // view 10 data per page->execute 2 query->dpt total data (RECOMMENDED)
        $student = Student::with('class')
            ->where('name', 'LIKE', '%'.$keyword.'%')
            ->orWhere('gender', $keyword)
            ->orWhere('nis', 'LIKE', '%'.$keyword.'%')
            ->orWhereHas('class', function($query) use ($keyword){
                // use($keyword)-> pakai variable yg sama, tak perlu variable baru
                //search CLASS ID which has relationship with students
                $query->where('name', 'LIKE', '%'.$keyword.'%');
            })
            ->simplePaginate(10);
        // view 10 data per page->execute 1 query only->tak dpt total data
        // $student = Student::simplePaginate(10);
        //studentList is a variable in MODEL to send the data to VIEW. 
        return view('student', ['studentList' => $student]);

        // $nilai = [9,8,7,6,5,4,1,2,3,0,10,11,12,20,1];

        //Collection Methods
        // $nilaiRataRata = collect($nilai)->avg();
        // dd($nilaiRataRata);

        //---->1. Contains method = check dalam array
        // $check = collect($nilai)->contains(function($value) {
        //     return $value < 6;
        // });
        // dd($check); //result adalah boolean: true/false

        //---->2. Diff method = check persamaan/perbezaan antara 2 array
        // $restaurantA = ["burger","dimsum","pizza","spaghetti","macaroni","martabak","bakso"];
        // $restaurantB = ["pizza","fried chicken","martabak","tomyam","ayam penyet","bakso"];
        // $menuRestoA = collect($restaurantA)->diff($restaurantB);
        // dd($menuRestoA); //menu yang takda dalam restaurant B
        // $menuRestoB = collect($restaurantB)->diff($restaurantA);
        // dd($menuRestoB); //menu yang takda dalam restaurant A

        //---->3. Filter method
        // $check = collect($nilai)->filter(function($value) {
        //     return $value > 7;
        // })->all();
        // dd($check);

        //---->4. Pluck method
        // $biodata = [
        //     ['nama' => 'Nad', 'umur' => 20], 
        //     ['nama' => 'Ika', 'umur' => 21],
        //     ['nama' => 'Eni', 'umur' => 19],
        //     ['nama' => 'Ain', 'umur' => 20]
        // ];
        // $check = collect($biodata)->pluck('nama')->all();
        // dd($check);

        //---->5. Map method = perulangan setiap satu data
        // $check = collect($nilai)->map(function($value) {
        //     return $value*2;
        // })->all();
        // dd($check);

        //PHP Methods
        // $countNilai = count($nilai);
        // $totalNilai = array_sum($nilai);
        // $nilaiRataRata = $totalNilai / $countNilai;
        // dd($nilaiRataRata);

        // $nilaiKaliDua = [];
        // foreach ($nilai as $value) {
        //     array_push($nilaiKaliDua, $value * 2);
        // }
        // dd($nilaiKaliDua);

        //Query Builder
        // $student = DB::table('students')->get();
        // dd($student);

        // DB::table('students')->insert([
        //     'name' => 'query builder',
        //     'gender' => 'L', 
        //     'nis' => '0222333',
        //     'class_id' => 1
        // ]);

        // DB::table('students')->where('id', 27)->update([
        //     'name' => 'query builder 1',
        //     'class_id' => 3
        // ]);

        // DB::table('students')->where('id', 26)->delete();

        //eloquent orm
        // $student = Student::all();
        // dd($student);

        // Student::create([
        //     'name' => 'eloquent',
        //     'gender' => 'P', 
        //     'nis' => '0222433',
        //     'class_id' => 2
        // ]);

        // Student::find(26)->update([
        //     'name' => 'eloquent 1',
        //     'class_id' => 2
        // ]);

        // Student::find(27)->delete();


    }

    public function show($id)
    {
        //class: nama function dalam STUDENT MODEL sbb ada relationship
        //homeroomTeacher: nama function dalam CLASSROOM MODEL sbb ada nested relationship
        //extracurriculars: nama function dalam STUDENT MODEL sbb ada relationship
        $student = Student::with(['class.homeroomTeacher', 'extracurriculars'])
        ->findOrFail($id);
        return view('student-detail', ['student' => $student]);
    }

    public function create()
    {
        $class = ClassRoom::select('id','name')->get();
        //file blade STUDENT-ADD
        return view('student-add', ['class' => $class]);
    }

    //hantar data student from FORM = SIMPAN 
    //StudentCreateRequest->compilations of form validations & rules at Requests file
    public function store(StudentCreateRequest $request)
    {
        $newname ='';

        if ($request->file('photo')) {
            //tambah extension utk STORED IMAGE (png/jpeg)
            $extension = $request->file('photo')->getClientOriginalExtension();

            // $newName = $request->name.'.'.$extension;
            //tambah extension utk STORED IMAGE (png/jpeg) & tarikh upload image
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            //simpan gambar dalam file STORAGE 
            // file()->'name' dalam input, store()->simpan & create folder photo
            $request->file('photo')->storeAs('photo', $newName);
        }
        


        //INI CARA MASUKKAN DATA SATU PER SATU
        //Student-> nama model 
        // $student = new Student;
        // //$request mesti input name dalam form
        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nis = $request->nis;
        // $student->class_id = $request->class_id;
        // $student->save();

        //MASS ASSIGNMENT
        //INI CARA MASUKKAN DATA BANYAK DLM SATU QUERY
        $request['image'] = $newName;
        $student = Student::create($request->all());

        //session flash data after ADD DATA
        if ($student) {
            //display message
            Session::flash('status', 'Success');
            Session::flash('message', 'New student added success');
        }
        //terus direct ke page STUDENT
        return redirect('/students');
    }

    //untuk VIEW DATA of STUDENT ID
    public function edit(Request $request, $id)
    {
        $student = Student::with('class')->findOrFail($id);

        //nak akses data semua CLASS ID & NAME, untuk student update data class
        // display ID dan NAME shj drpd CLASS TABLE
        //where-> pengecualian current CLASS ID & NAME of STUDENT ID
        $class = ClassRoom::where('id', '!=', $student->class->id)->get(['id', 'name']); 
        return view('student-edit', ['student' => $student, 'class' => $class]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        //Without MASS ASSIGNMENT
        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nis = $request->nis;
        // $student->class_id = $request->class_id;
        // $student->save();

        //With MASS ASSIGNMENT
        $student->update($request->all());
        return redirect('/students');
    }

    //view data student before DELETE
    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('student-delete', ['student' => $student]);
    }

    //untuk DELETE data
    public function destroy($id)
    {
        //Query builder
        // $deletedStudent = DB::table('students')->where('id', $id)->delete();
        // return redirect('/students');

        //Eloquent 
        $deletedStudent = Student::findOrFail($id);
        $deletedStudent->delete();

        if ($deletedStudent) {
            //display message
            Session::flash('status', 'Success');
            Session::flash('message', 'A student has been deleted');
        }

        return redirect('/students');
        

        // $student = Student::findOrFail($id);
    }

    //untuk view DELETED STUDENT
    public function deletedStudent()
    {
        $deletedStudent = Student::onlyTrashed()->get();
        return view('student-deleted-list', ['student' => $deletedStudent]);
    }

    //untuk RESTORE DATA from DB
    public function restore($id)
    {
        $deletedStudent = Student::withTrashed()->where('id', $id)->restore();

        if ($deletedStudent) {
            //display alert message
            Session::flash('status', 'Success');
            Session::flash('message', 'A student has been restored');
        }

        return redirect('/students');
    }
}
