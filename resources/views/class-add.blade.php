@extends('layouts.mainlayout')

@section('title', 'Add class')

@section('content')

    <div class="mt-5 col-4 m-auto">
        <form action="class" method="post">
            @csrf
            <div class="mb-3">
                <label for="name">Class name</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>

            <div class="mb-3">
                <label for="teacher">Teacher name</label>
                <select name="teacher_id" id="teacher" class="form-control">
                    <option value="">Select teacher</option>
                    @foreach ($teacher as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>

@endsection