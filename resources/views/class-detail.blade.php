@extends('layouts.mainlayout')

@section('title', 'Class Details')

@section('content')

    <style>
        th {
            width: 25px;
            columns: 2;
        }
    </style>


    <div class="mt-5">

        <table class="table table-bordered">
            <tr>
                <th>Class name</th>
                <td>{{ $class->name }}</td>
            </tr>
            <tr>
                <th class="text-nowrap">Homeroom teacher </th>
                <td>{{ $class->homeroomTeacher->name }}</td>
            </tr>
            <tr>
                <th>Student list </th>
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