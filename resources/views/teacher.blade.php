@extends('layouts.mainlayout')

@section('title', 'Teacher')

@section('content')
	<h1>TEACHER</h1>

    <div class="my-5">
        <a href="" class="btn btn-primary">Add data</a>

    </div>

    <h3>Teacher List</h3>
    
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $teacherList as $data )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td><a href="teacher-detail/{{ $data->id }}">Details</a></td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
@endsection