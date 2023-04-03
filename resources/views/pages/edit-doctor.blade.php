@extends('layouts.admin')
@section('content')
	<input type="text" value="{{ $user->name }}" disabled>
	<input type="text" value="{{ $user->email }}" disabled>
	<input type="text" value="{{ $user->specialist }}" disabled>
	<input type="text" value="{{ $user->description }}" disabled>
	<input type="text" value="{{ $user->work_experience }}" disabled>
	<input type="text" value="{{ $user->acc_type }}" disabled>
	<a href="/admin/doctor-list/{{ $user->id }}/password">
		<i class="fa fa-solid fa-pencil">Change Password</i>
	</a>
 @foreach($invoices as $invoice)
     {{ $invoice->doctor }}
     {{ $invoice->id }}
     {{ $invoice->amount }}
     {{ $invoice->patient }}
		 <br>
 @endforeach
 
@endsection
