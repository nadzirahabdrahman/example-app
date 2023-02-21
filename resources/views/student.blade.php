@extends('layouts.mainlayout')

@section('title', 'Student')

@section('content')

<style>
    th {
        text-align: center;
    }

    td {
        text-align: center;

    }

    .student-name {
        text-align: left;

    }
</style>

	<h1>STUDENTS</h1>

    @if(Auth::user()->role_id == 1) 
    <div class="my-5 d-flex justify-content-between">
        <a href="student-add" class="btn btn-primary">Add new student</a>
        <a href="student-deleted" class="btn btn-info">Show deleted students</a>

    </div>
        @if(Session::has('status'))
            <!-- alert warna hijau from bootstrap -->
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
    
        
        @endif

    @else
        
    @endif

    <h3>Student List</h3>

    <x-alert message='Welcome to student' type='success'/> 

    <div class="my-3 col-12 col-sm-6 col-md-5"> <!-- my: margin top & bottom -->
        <form action="" method="get">
            <div class="input-group mb-3">
                
                    <input type="text" class="form-control" name="keyword" 
                    placeholder="Keyword">
                    <button class="input-group-text btn btn-primary">Search</button>
                
            </div>
        </form>
    </div>

    <table class="table table-light table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th class="student-name">Name</th>
                <th>Gender</th>
                <th>NIS</th>
                <th>Class</th>
                <th>Action</th>
            </tr>
        </thead>
            
        <tbody class="table-group-divider">
            @foreach ($studentList as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="student-name">{{ $data->name }}</td> 
                <td>{{ $data->gender }}</td> 
                <td>{{ $data->nis }}</td> 
                <td>{{ $data->class->name }}</td>
                <td>
                    {{-- untuk STUDENT shj --}}
                    @if(Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
                        <p class="text-danger">Not accessible for student</p>
                    @else
                    {{-- untuk ADMIN & TEACHER --}}
                        <a class="btn btn-info" href="student/{{ $data->id }}">Details</a>
                        <a class="btn btn-primary" href="student-edit/{{ $data->id }}">Edit</a>
                        
                    @endif

                    {{-- untuk ADMIN shj --}}
                    @if(Auth::user()->role_id == 1)
                        <a class="btn btn-danger" href="student-delete/{{ $data->id }}">Delete</a>
                    @else
                        
                    @endif
                      
                </td> 
            @endforeach    
                {{-- <!-- class: nama function dalam MODEL -->
                <!-- <td>{{ $data->class['name']}}</td>
                <td>--> <!--Eager loading-->
                    <!-- extracurriculars: nama function dalam MODEL -->
                    <!--@foreach ($data->extracurriculars as $item)
                    - {{ $item['name'] }} <br>
                        
                    @endforeach    
                </td>-->
                <!-- homeroomTeacher: nama function dalam CLASS MODEL -->
                <!-- homeroomTeacher->name: panggil column NAME dlm TEACHERS TABLE -->
                <!--<td>{{ $data->class->homeroomTeacher->name }}</td>-->
            
            
         --}}
            </tr>
        </tbody>
    </table>

    {{-- <! -- next page to display students data 
            withQueryString(): search data for all PAGES --> --}}
    <div class="pagination justify-content-center">
        {{ $studentList->withQueryString()->links() }}
    </div>
    
    
@endsection