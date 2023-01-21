@extends('layouts.mainlayout')

@section('title', 'Class Details')

@section('content')

    <style>
        th {
            width: 25px;
        }
    </style>

    <h2>Class name: {{ $class->name }}</h2>

    <div class="mt-5">

        <table class="table table-bordered">
            <tr>
                <th>Homeroom Teacher: </th>
                <td>{{ $class->homeroomTeacher->name }}</td>
            </tr>
            <tr>
                <th>Student List: </th>
                <td>
                    <ol>
                        @foreach ($class->students as $item)
                            <li>{{ $item->name }}</li>
                        @endforeach
                    </ol>
                </td>
            </tr>
        </table>
    </div>

    
    
    
@endsection