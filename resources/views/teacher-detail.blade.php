@extends('layouts.mainlayout')

@section('title', 'Teacher Details')

@section('content')

    <style>
        th {
            width: 25px;
            columns: 2;
            
        }
    </style>

<div class="my-3 d-flex justify-content-center">

    @if($teacher->image != '')
        <!-- retrieve student image dr folder storage/photo yg dah link -->
        <img src="{{ asset('storage/photo-teacher/'.$teacher->image) }}" alt="" 
        width="200px">
    @else
        <img src="{{ asset('images/default pp.png') }}" alt="" 
        width="200px">
    @endif
    
</div>

    <div class="mt-5">
        <table class="table table-bordered">
            <tr>
                <th class="text-nowrap">Teacher name</th>
                <td>{{ $teacher->name }}</td>
            </tr>
            <tr>
                <th>Class </th>
                <td>
                    @if($teacher->class)
                        {{ $teacher->class->name }}
                    @else
                        No class
                    @endif
                </td>
            </tr>
            <tr>
                <th>Student list </th>
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