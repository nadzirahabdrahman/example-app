@extends('layouts.mainlayout')

@section('title', 'Delete student')

@section('content')

    <div class="mt-5">
        <h3>Are sure you want to delete student {{ $student->name }} {{ $student->nis }} ?</h3>

        <form style="display: inline-block" action="/student-destroy/{{ $student->id }}"
            method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Yes</button>
            <a href="/students" class="btn btn-primary">No</a>
        </form>
    </div>

@endsection