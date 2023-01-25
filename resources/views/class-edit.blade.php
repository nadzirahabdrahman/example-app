@extends('layouts.mainlayout')

@section('title', 'Class edit')

@section('content')

<div class="mt-5 col-4 m-auto">
    <form action="/class/{{ $class->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Class name</label>
            <input type="text" class="form-control" name="name" id="name" 
            value="{{ $class->name }}" required>
        </div>

        <div class="mb-3">
            <label for="teacher">Teacher name</label>
            <select name="teacher_id" id="teacher" class="form-control">
                {{-- homeroomTeacher: kena sama dengan relationship name dlm MODEL --}}
                <option value="{{ $class->homeroomTeacher->id }}">
                    {{ $class->homeroomTeacher->name }}</option>
                    @foreach ($teacher as $item)
                        <option value="{{  $item->id  }}">{{ $item->name }}</option>
                    @endforeach
                
            </select>
        </div>

        <div class="mb-3">
            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </form>
</div>

@endsection