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
	<table class="w-full text-sm text-left text-gray-500">
		<thead class="text-xs text-gray-700 uppercase">
		<tr>
			<th scope="col" class="px-6 py-3">
				No
			</th>
			<th scope="col" class="px-6 py-3">
				Product name
			</th>
			<th scope="col" class="px-6 py-3">
				Price
			</th>
			<th scope="col" class="px-6 py-3">
				Qty
			</th>
			<th scope="col" class="px-6 py-3">
				Amount
			</th>
		</tr>
		</thead>
		
		<tbody>
		@if (count ($invoices)>0)
			@foreach ($invoices as $key => $invoice)
				<tr class="bg-white border-b">
					<td class="px-6 py-4">
						{{ ++$key }}
					</td>
					<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
						{{ $invoice->id }}
					</th>
					
					<td class="px-6 py-4">
						{{ $invoice->patient }}
					</td>
					<td class="px-6 py-4">
						{{ $invoice->date }}
					</td>
					<td class="px-6 py-4">
						{{ $invoice->amount }}
					</td>
				</tr>
			@endforeach
		@else
			<tr>
				<td>
					Empty Record
				</td>
			</tr>
		</tbody>
	</table>
	@endif

@endsection
