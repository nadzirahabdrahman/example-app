@extends('layouts.mainlayout')

@section('title', 'Delete teacher')

@section('content')

    <div class="mt-5">
        <h3>Are sure you want to delete teacher  {{ $teacher->name }}?</h3>
        <form style="display: inline-block" action="/teacher-destroy/{{ $teacher->id }}"
            method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Yes</button>
            <a href="/teacher" class="btn btn-primary">No</a>
        </form>
    </div>

@endsection