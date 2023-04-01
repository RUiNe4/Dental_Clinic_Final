@extends('layouts.admin')
@section('content')
	<div>
		@auth
			{{ auth()->user () -> name }}
		@endauth
	</div>
@endsection