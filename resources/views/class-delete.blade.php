@extends('layouts.mainlayout')

@section('title', 'Delete class')

@section('content')

    <div class="mt-5">
        <h3>Are sure you want to delete class  {{ $class->name }}?</h3>
        <form style="display: inline-block" action="/class-destroy/{{ $class->id }}"
            method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Yes</button>
            <a href="/class" class="btn btn-primary">No</a>
        </form>
    </div>

@endsection