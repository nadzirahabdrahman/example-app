@extends('layouts.mainlayout')

@section('title', 'Extracurricular Details')

@section('content')

    <style>
        th {
            width: 25px;
            columns: 2;
        }
    </style>

    <div class="mt-5">
        <table class="table table-bordered">
            <tr>
                <th class="text-nowrap">Extracurricular name</th>
                <td>{{ $ekskul->name }}</td>
            </tr>
            <tr>
                <th>Student list </th>
                <td>
                    @foreach ($ekskul->students as $item)
                        <li>{{ $item->name }}</li>
                    @endforeach
                </td>
            </tr>
        </table>
    </div>

@endsection