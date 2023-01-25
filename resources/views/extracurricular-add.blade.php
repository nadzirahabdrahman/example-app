@extends('layouts.mainlayout')

@section('title', 'Add extracurricular')

@section('content')

<div class="mt-5 col-4 m-auto">
    <form action="extracurricular" method="post">
        @csrf
        <div class="mb-3">
            <label for="name">Extracurricular name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>

        <div class="mb-3">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>
</div>

@endsection