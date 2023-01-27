@extends('layouts.mainlayout')

@section('title', 'Class')

@section('content')

<style>
    th {
        text-align: center;
    }

    td {
        text-align: center;

    }

    .class-name {
        text-align: left;

    }
</style>

	<h1>CLASS</h1>

    @if(Auth::user()->role_id == 1) 
    <div class="my-5 d-flex justify-content-between">
        <a href="class-add" class="btn btn-primary">Add new class</a>
        <a href="class-deleted" class="btn btn-info">Show deleted classes</a>
    </div>

    @if(Session::has('status'))
            <!-- alert warna hijau from bootstrap -->
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
    
        
    @endif
    @endif

    <h3>Class List</h3>

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
                <th class="class-name">Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody class="table-group-divider">
            @foreach ( $classList as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="class-name">{{ $data->name }}</td>
                <td>
                    {{-- untuk STUDENT shj --}}
                    @if(Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
                        <p class="text-danger">Not accessible for student</p>
                    @else
                    {{-- untuk ADMIN && TEACHER --}}
                        <a class="btn btn-info" href="class/{{ $data->id }}">Details</a>
                    @endif

                    @if(Auth::user()->role_id == 1)
                        <a class="btn btn-primary" href="class-edit/{{ $data->id }}">Edit</a>
                        <a class="btn btn-danger" href="class-delete/{{ $data->id }}">Delete</a>
                    @else
                        
                    @endif
                    
                </td>

                {{-- <!--Eager loading-->
                <!-- <td> 
                    @foreach ($data->students as $student)
                    - {{ $student['name'] }} <br>
                        
                    @endforeach    
                </td> -->
                <!-- homeroomTeacher panggil drpd MODEL-->
                <!-- <td>{{ $data->homeroomTeacher->name }}</td> --> --}}
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination justify-content-center">
        {{ $classList->withQueryString()->links() }}
    </div>
@endsection