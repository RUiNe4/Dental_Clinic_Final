@extends('layouts.admin')
@section('content')
	@if(auth ()->user ()->acc_type=='Doctor')
		<form action="/create/invoice/clear">
			<button
				class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
				Clear
			</button>
		</form>
		<form action="/create/invoice/generate/{{ auth()->user ()->name }}" method="POST" enctype="multipart/form-data">
			@csrf
			<label>Date: </label>
			<input type="text" name="curdate" value="{{ $date }}"/>
			<div class="flex flex-row items-center">
				<label for="doctor_name" class="block mb-2 text-sm font-medium text-gray-900 pt-4 mr-5">Doctor:</label>
				<select id="doctor_name" name="doctor_name" {{ auth ()->user ()->acc_type == 'admin' ? '' : 'disabled' }}
				class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/6 p-2.5 mt-2 mr-5">
					@if(auth ()->user ()->acc_type == 'admin')
						@foreach($doctors as $doctor)
							<option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
						@endforeach
					@else
						<option value="{{ auth ()->user ()->name }}">{{ auth ()->user ()->name }}</option>
					@endif
				</select>
				<label for="patient_name" class="block mb-2 text-sm font-medium text-gray-900 pt-4 mr-5">Patient:</label>
				<select id="patient_name" name="patient_name"
								class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/6 p-2.5 mt-2 mr-5">
					@foreach ($patients as $patient)
						@if($patient->status == 'Approve')
						<option
							value="{{ $patient->firstName . ' ' . $patient->lastName }}">{{ $patient->firstName . ' ' . $patient->lastName }}</option>
						@endif
					@endforeach
				</select>
				<button
					class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 mt-3">
					Generate Receipt
				</button>
			</div>
			<input type="text" name="total" value="{{ $total }}" hidden>
		</form>

		<div>
			<label for="treatment" class="block mb-2 text-sm font-medium text-gray-900">Enter Item:</label>
			<form action="/create/invoice/add">
				<select id="treatment" name="treatment"
								class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/6 p-2.5">
					@foreach ($treatments as $treatment)
						<option value="{{ $treatment->id }}">{{ $treatment->treatment_name }}</option>
					@endforeach
				</select>
				<div class="form-outline mt-5">
					<input type="number" name="qty" required id="typeNumber"
								 class="border border-gray-300 rounded-lg w-1/6 form-control mb-4" placeholder="Enter Qty" min="1"
								 max="100"/>
				</div>
				<button
					class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
					Add
					Item
				</button>
			</form>
		</div>

		<div class="relative overflow-x-auto">
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
				@if ($items)
					@foreach ($items as $key => $item)
						<tr class="bg-white border-b">
							<td class="px-6 py-4">
								{{ ++$key }}
							</td>
							<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
								{{ $item->treatment_name }}
							</th>

							<td class="px-6 py-4">
								{{ $item->price }}
							</td>
							<td class="px-6 py-4">
								{{ $item->qty }}
							</td>
							<td class="px-6 py-4">
								{{ $item->qty * $item->price }}
							</td>
						</tr>
					@endforeach
				@else
					@foreach (range(1, 15) as $i)
						<tr class="bg-white border-b">
							<td class="px-6 py-4">
							</td>
							<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
							</th>
							<td class="px-6 py-4">
							</td>
							<td class="px-6 py-4">
							</td>
							<td class="px-6 py-4">
							</td>
						</tr>
					@endforeach
				@endif
				</tbody>
			</table>
		</div>
		<div class="flex items-center">
			<label style="margin-top:50px; margin-right:20px;" for="">Total: </label>
			<input type="text" value="{{$total}}"
						 style="background-color: white; text-align:start; width:50px;margin-top:50px;"
						 disabled/>
			<label for="" style="margin-top:50px;">$</label>
		</div>
	@else

@endif
		{{--		List Doctors Treatment History--}}
	@endif
@endsection
