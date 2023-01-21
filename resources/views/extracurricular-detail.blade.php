@extends('layouts.mainlayout')

@section('title', 'Extracurricular Details')

@section('content')

    <style>
        th {
            width: 25px;
        }
    </style>

    <h2>Extracurricular name: {{ $ekskul->name }}</h2>

    <div class="mt-5">
        <table class="table table-bordered">
            <tr>
                <th>Student List: </th>
                <td>
                    @foreach ($ekskul->students as $item)
                        <li>{{ $item->name }}</li>
                    @endforeach
                </td>
            </tr>
        </table>
    </div>

@endsection