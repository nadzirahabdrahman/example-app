@extends('layouts.mainlayout')

@section('title', 'Home')

@section('content')
		<h1>HOME</h1>
		<h2>Welcome {{ Auth::user()->name }}</h2>

		{{-- view email from DB  --}}
		{{-- {{ Auth::user()->role->name }} --}}


		
		{{-- <!-- @if($role == 'Admin') 
			<a href="">ke halaman admin</a>

		@elseif ($role == 'Staff')
			<a href="">ke halaman gudang</a>

		@else 
			<a href="">ke halaman lain</a>

		@endif -->

		<!-- @switch ($role)
			@case ($role == 'Admin') 
				<a href="">ke halaman admin</a>
				@break

			@case ($role == 'Staff')
				<a href="">ke halaman gudang</a>
				@break

			@default
				<a href="">ke halaman lain</a>

		@endswitch -->

		<!-- @for ($i = 0; $i < 5; $i++)
			{{$i}} <br>

		@endfor -->

		<!-- @foreach ($buah as $data)
			{{$data}} <br>

		@endforeach  -->

		<!-- <table class="table">
			<tr>
				<th>No.</th>
				<th>Nama</th>
			</tr>
			@foreach ($buah as $data)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$data}}</td>
			</tr>
			@endforeach
		</table> --> --}}
@endsection
