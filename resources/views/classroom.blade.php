@extends('layouts.mainlayout')

@section('title', 'Class')

@section('content')
	<h1>CLASS</h1>

    <div class="my-5 d-flex justify-content-between">
        <a href="class-add" class="btn btn-primary">Add new class</a>
        <a href="" class="btn btn-info">Show deleted classes</a>
    </div>

    @if(Session::has('status'))
            <!-- alert warna hijau from bootstrap -->
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
    
        
    @endif

    <h3>Class List</h3>
    
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
                <!-- <th>Students</th>
                <th>Teacher</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach ( $classList as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td><a href="class/{{ $data->id }}">Details</a></td>
                <td><a href="class-edit/{{ $data->id }}">Edit</a></td>
                <td><a href="class-delete/{{ $data->id }}">Delete</a></td>
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
@endsection