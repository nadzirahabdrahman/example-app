@extends('layouts.mainlayout')

@section('title', 'Teacher Details')

@section('content')

    <style>
        th {
            width: 25px;
        }
    </style>

    <h2>Teacher name: {{ $teacher->name }}</h2>

    <div class="mt-5">
        <table class="table table-bordered">
            <tr>
                <th>Class: </th>
                <td>
                    @if($teacher->class)
                        {{ $teacher->class->name }}
                    @else
                        No class
                    @endif
                </td>
            </tr>
            <tr>
                <th>Student List: </th>
                <td>
                    @if($teacher->class)
                        @foreach ($teacher->class->students as $item)
                            <li>{{ $item->name }}</li>
                        @endforeach
                    @else
                        No students
                    @endif
                </td>
            </tr>
        </table>
    </div>

@endsection