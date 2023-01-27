@extends('layouts.mainlayout')

@section('title', 'Student Details')

@section('content')

    <style>
        th {
            width: 25px;
            columns: 2;
        }
    </style>

    <div class="my-3 d-flex justify-content-center">

        @if($student->image != '')
            <!-- retrieve student image dr folder storage/photo yg dah link -->
            <img src="{{ asset('storage/photo/'.$student->image) }}" alt="" 
            width="200px">
        @else
            <img src="{{ asset('images/default pp.png') }}" alt="" 
            width="200px">
        @endif
        
    </div>

    <div class="mt-5 mb-5" > <!-- MT: margin top -->
    <table class="table table-bordered">
        <tr>
            <th class="text-nowrap">Student name</th>
            <td>{{ $student->name }}</td>
        </tr>
        <tr>
            <th>NIS</th>
            <td>{{ $student->nis }}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>
                @if($student->gender == 'P')
                    Perempuan
                @else
                    Lelaki
                @endif
            </td>
        </tr>
        <tr>
            <th>Class</th>
            <td>{{ $student->class->name }}</td>
        </tr>
        <tr>
            <th>Teacher</th>
            <td>{{ $student->class->homeroomTeacher->name }}</td>
        </tr>
        <tr>
            <th>Extracurricular</th>
            <td>
                @foreach ( $student->extracurriculars as $item)
                <li>{{ $item->name }}</li>
                @endforeach
            </td>
        </tr>
    </table>
    </div>
    
    
@endsection