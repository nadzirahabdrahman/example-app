@extends('layouts.mainlayout')

@section('title', 'Extracurricular')

@section('content')

<style>
    th {
        text-align: center;
    }

    td {
        text-align: center;

    }

    .ekskul-name {
        text-align: left;

    }
</style>

    <h1>Extracurricular</h1>

    @if(Auth::user()->role_id == 1) 
    <div class="my-5 d-flex justify-content-between">
        <a href="extracurricular-add" class="btn btn-primary">Add new extracurricular</a>
        <a href="extracurricular-deleted" class="btn btn-info">Show deleted extracurricular</a>
        
    </div>

    @if(Session::has('status'))
            <!-- alert warna hijau from bootstrap -->
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
    
    @endif    
    @endif

    <h3>Extracurricular List</h3>

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
                <th class="ekskul-name">Name</th>
                <th>Action</th>
                <!-- <th>Student Name</th> -->
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ( $ekskulList as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="ekskul-name">{{ $data->name }}</td>
                    <td>
                        {{-- untuk STUDENT shj --}}
                    @if(Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
                        <p class="text-danger">Not accessible for student</p>

                    @else
                    {{-- untuk ADMIN && TEACHER --}}
                        <a class="btn btn-info" href="extracurricular-detail/{{ $data->id }}">Details</a>

                    @endif

                    {{-- untuk ADMIN shj --}}
                    @if(Auth::user()->role_id == 1)
                        <a class="btn btn-primary" href="extracurricular-edit/{{ $data->id }}">Edit</a>
                        <a class="btn btn-danger" href="extracurricular-delete/{{ $data->id }}">Delete</a>

                    @else

                    @endif
                    </td>
                    {{-- <!-- <td>
                        @foreach ( $data->students as $item)
                            - {{ $item->name }}<br>
                        @endforeach
                    </td> --> --}}
                </tr>
            @endforeach
        </tbody>
        
    </table>
    
    <div class="pagination justify-content-center">
        {{ $ekskulList->withQueryString()->links() }}
    </div>

@endsection