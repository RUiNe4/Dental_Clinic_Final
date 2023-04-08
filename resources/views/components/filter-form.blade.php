<div class="flex mt-3 items-center">
	<form class="flex items-start w-3/4" action="/doctor/patient-list/{{ $sort == 'asc' ? 'desc' : 'asc' }}">
		<button
			class="rounded-lg mr-3  text-left py-1 px-3 text-gray-900 hover:bg-[#4F9298] hover:cursor-pointer hover:border-none hover:text-white ease-in-out duration-300 {{ request ()['filter'] == NULL ? 'font-bold border-b-2 border-[#65C7D0] rounded-lg' : '' }}"
			type="submit" name="filter" value="">
			Default
			<object data="{{ asset('/assets/image/arrow-up-down.svg') }}" type="" width="14" height="14"
							class="inline-block"></object>
		</button>
		<button
			class="rounded-lg mr-3  text-left py-1 px-3 text-gray-900 hover:bg-[#4F9298] hover:cursor-pointer hover:border-none hover:text-white ease-in-out duration-300 {{ request ()['filter'] == 'paid' ? 'font-bold border-b-2 border-[#65C7D0] rounded-lg' : '' }}"
			type="submit" name="filter" value="paid">
			Former Patients
			<object data="{{ asset('/assets/image/arrow-up-down.svg') }}" type="" width="14" height="14"
							class="inline-block"></object>
		</button>
		<button
			class="rounded-lg mr-3  text-left py-1 px-3 text-gray-900 hover:bg-[#4F9298] hover:cursor-pointer hover:border-none hover:text-white ease-in-out duration-300 {{ request ()['filter'] == 'unpaid' ? 'font-bold border-b-2 border-[#65C7D0] rounded-lg' : '' }}"
			type="submit" name="filter" value="unpaid">
			Pending Patients
			<object data="{{ asset('/assets/image/arrow-up-down.svg') }}" type="" width="14" height="14"
							class="inline-block"></object>
		</button>
		<button
			class="rounded-lg mr-3  text-left py-1 px-3 text-gray-900 hover:bg-[#4F9298] hover:cursor-pointer hover:border-none hover:text-white ease-in-out duration-300 {{ request ()['filter'] == 'firstName' ? 'font-bold border-b-2 border-[#65C7D0] rounded-lg' : '' }}"
			type="submit" name="filter" value="firstName">
			A - Z
			<object data="{{ asset('/assets/image/arrow-up-down.svg') }}" type="" width="14" height="14"
							class="inline-block"></object>
		</button>
		<button
			class="rounded-lg mr-3  text-left py-1 px-3 text-gray-900 hover:bg-[#4F9298] hover:cursor-pointer hover:border-none hover:text-white ease-in-out duration-300 {{ request ()['filter'] == 'id' ? 'font-bold border-b-2 border-[#65C7D0] rounded-lg' : '' }}"
			type="submit" name="filter" value="id">
			ID
			<object data="{{ asset('/assets/image/arrow-up-down.svg') }}" type="" width="14" height="14"
							class="inline-block"></object>
		</button>
	</form>
</div>
