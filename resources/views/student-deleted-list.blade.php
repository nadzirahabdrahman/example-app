@extends('layouts.mainlayout')

@section('title', 'Deleted students')

@section('content')

    <h1>DELETED STUDENTS</h1>

    <a href="/students" class="btn btn-primary">Back</a>

    <div class="mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>NIS</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($student as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td> 
                        <td>{{ $data->gender }}</td> 
                        <td>{{ $data->nis }}</td> 
                        <td>
                            <a href="student/{{ $data->id }}/restore">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection