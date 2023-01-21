@extends('layouts.mainlayout')

@section('title', 'Class')

@section('content')
	<h1>CLASS</h1>

    <div class="my-5">
        <a href="" class="btn btn-primary">Add data</a>

    </div>

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
                <!--Eager loading-->
                <!-- <td> 
                    @foreach ($data->students as $student)
                    - {{ $student['name'] }} <br>
                        
                    @endforeach    
                </td> -->
                <!-- homeroomTeacher panggil drpd MODEL-->
                <!-- <td>{{ $data->homeroomTeacher->name }}</td> -->
            </tr>
                
            @endforeach
        </tbody>
    </table>
@endsection