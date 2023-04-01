{{--	edit form--}}
<div class=" {{ auth()->user ()->acc_type != 'admin' ? 'hidden' : ''}} right-section text-white">
	<form action="/admin/edit/{{ $patient->id }}" method="POST">
		@csrf
		@method('PATCH')
		<input type="submit" value="Submit">
		<input required type="submit" hidden class="border border-gray-200 rounded p-2 w-full text-black mb-2"
					 name="doctorValue" value="{{ request()->query('doctorValue') }}" placeholder=""/>
		<select class="{{ $patient->appointedDoctor !=NULL ? 'hidden':'' }}text-black" name="doctorValue" id="doctorValue">
			@foreach ($doctors as $doctor)
				<option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
			@endforeach
		</select>
		<button type="submit" class="bg-green-400 text-sm px-2 py-1 rounded-md mr-2 mb-2">
			Accept
		</button>
	</form>
	<form action="/admin/mailbox/{{ $patient->id }}" method="POST">
		@csrf
		@method('DELETE')
		<button class="bg-red-500 text-sm px-2 py-1 rounded-md">
			Decline
		</button>
	</form>
</div>
{{--	edit form--}}