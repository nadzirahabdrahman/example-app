@extends('layouts.mainlayout')

@section('title', 'Deleted extracurricular')

@section('content')

    <h1>DELETED EXTRACURRICULAR</h1>

    <a href="/extracurricular" class="btn btn-primary">Back</a>

    <div class="mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($ekskul as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>
                            <a href="extracurricular/{{ $data->id }}/restore">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection