@extends('layouts.mainlayout')

@section('title', 'Add student')

@section('content')

    <div class="mt-5 col-8 m-auto">

        @if ($errors->any())
            <!-- alert from bootstrap -->
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <form action="student" method="post" enctype="multipart/form-data">
            @csrf
            <!-- NAME mestilah SAMA dengan nama COLUMN table-->
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>

            <div class="mb-3">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="">Please select</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nis">ID</label>
                <input type="text" class="form-control" name="nis" id="nis">
            </div>

            <div class="mb-3">
                <label for="class">Class</label>
                <select name="class_id" id="class" class="form-control">
                    <option value="">Please select</option>
                    @foreach ($class as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        
                    @endforeach
                </select>
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