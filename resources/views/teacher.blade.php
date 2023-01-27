@extends('layouts.mainlayout')

@section('title', 'Teacher')

@section('content')

<style>
    th {
        text-align: center;
    }

    td {
        text-align: center;

    }

    .teacher-name {
        text-align: left;

    }
</style>

	<h1>TEACHER</h1>

    @if(Auth::user()->role_id == 1) 
    <div class="my-5 d-flex justify-content-between">
        <a href="teacher-add" class="btn btn-primary">Add new teacher</a>
        <a href="teacher-deleted" class="btn btn-info">Show deleted teachers</a>

    </div>

    @if(Session::has('status'))
            <!-- alert warna hijau from bootstrap -->
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
    
    @endif
    @endif

    <h3>Teacher List</h3>

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
                <th class="teacher-name">Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ( $teacherList as $data )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="teacher-name">{{ $data->name }}</td>
                <td>
                    
                    {{-- untuk ADMIN shj --}}
                    @if(Auth::user()->role_id == 1)
                        <a class="btn btn-info" href="teacher-detail/{{ $data->id }}">Details</a>
                        <a class="btn btn-primary" href="teacher-edit/{{ $data->id }}">Edit</a>
                        <a class="btn btn-danger" href="teacher-delete/{{ $data->id }}">Delete</a>
                    
                    @else
                        <p class="text-danger">Not accessible</p>
                    @endif
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>

    <div class="pagination justify-content-center">
        {{ $teacherList->withQueryString()->links() }}
    </div>

@endsection