@extends('layouts.mainlayout')

@section('title', 'Extracurricular')

@section('content')
    <h1>Extracurricular</h1>

    <div class="my-5 d-flex justify-content-between">
        <a href="extracurricular-add" class="btn btn-primary">Add new extracurricular</a>
        <a href="" class="btn btn-info">Show deleted extracurricular</a>
        
    </div>

    <h3>Extracurricular List</h3>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
                <!-- <th>Student Name</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach ( $ekskulList as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td><a href="extracurricular-detail/{{ $data->id }}">Details</a></td>
                    <td><a href="extracurricular-edit/{{ $data->id }}">Edit</a></td>
                    <td><a href="extracurricular-delete/{{ $data->id }}">Delete</a></td>
                    <!-- <td>
                        @foreach ( $data->students as $item)
                            - {{ $item->name }}<br>
                        @endforeach
                    </td> -->
                </tr>
            @endforeach
        </tbody>
        
    </table>
    
@endsection