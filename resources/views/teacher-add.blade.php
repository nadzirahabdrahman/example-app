@extends('layouts.mainlayout')

@section('title', 'Add teacher')

@section('content')

<div class="mt-5 col-4 m-auto">
    <form action="teacher" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name">Teacher name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>

        <div class="mb-3">
            <label for="photo">Photo</label>
            <div class="input-group">
                <input type="file" class="form-control" id="photo" name="photo">
              </div>
        </div>

        <div class="mb-3">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>

</div>

@endsection