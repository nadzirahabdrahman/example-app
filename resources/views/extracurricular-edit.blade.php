@extends('layouts.mainlayout')

@section('title', 'Edit extracurricular')

@section('content')

<div class="mt-5 col-4 m-auto">
    <form action="/extracurricular/{{ $ekskul->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Extracurricular name</label>
            <input type="text" class="form-control" name="name" id="name" 
            value="{{ $ekskul->name }}">
        </div>

        <div class="mb-3">
            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </form>
</div>

@endsection