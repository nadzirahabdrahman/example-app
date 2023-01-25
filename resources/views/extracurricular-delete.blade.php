@extends('layouts.mainlayout')

@section('title', 'Delete extracurricular')

@section('content')

    <div class="mt-5">
        <h3>Are sure you want to delete {{ $ekskul->name }} in extracurricular?</h3>
        <form style="display: inline-block" action="/extracurricular-destroy/{{ $ekskul->id }}"
            method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Yes</button>
            <a href="/extracurricular" class="btn btn-primary">No</a>
        </form>
    </div>

@endsection