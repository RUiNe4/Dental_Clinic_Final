<style>
    textarea,
    input {
        color: #4F9298;
    }

    textarea:focus,
    input:focus {
        --tw-ring-color: #4ECAD2 !important;
    }

    textarea::placeholder,
    input::placeholder {
        font-size: 12px;
    }
</style>
<form class="p-3 flex flex-col gap-2 items-center" action="/appointment/create" method="post">
	<div style="color: #4F9298" class="text-2xl">
		<x-form-title title="Book Appointment"/>
	</div>
	<div class="flex flex-col  gap-2 justify-start" style="width: 70%;">
		@csrf
		@method('POST')
		<input style="background-color: #C0F3F7; width: 100%"
					 class="{{ request ()->path () == "appointment" ? "hidden" : ""}} border-none rounded-md" type="text"
					 name="appointedDoctor" id="" value="{{ $user->name }}"
					 placeholder="{{ $user->name }}" disabled>
		<input style="background-color: #C0F3F7; width: 100%" class="border-none rounded-md" type="text" name="fName" id=""
					 required placeholder="First name">
		<input style="background-color: #C0F3F7; width: 100%" class="border-none rounded-md" type="text" name="lName" id=""
					 required placeholder="Last name">
		<input style="background-color: #C0F3F7; width: 100%" class="border-none rounded-md" type="text" name="phoneNum"
					 id="" required placeholder="Phone No.">
		<input style="background-color: #C0F3F7; width: 100%" class="border-none rounded-md" type="text" name="email" id=""
					 required placeholder="E-mail">
		<div class="relative" style="width: 100%">
			<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
				<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="#4F9298" viewBox="0 0 20 20"
						 xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
								d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
								clip-rule="evenodd"></path>
				</svg>
			</div>
			<input style="background-color: #C0F3F7; color: #4F9298;" datepicker datepicker-format="yyyy-mm-dd"
						 name="birthday" type="text" class="border-none text-gray-900 rounded-md block w-full pl-10 p-2.5"
						 placeholder="Date of Birth">
		</div>
		
		<div class="relative" style="width: 100%">
			<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none hover:cursor-pointer">
				<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="#4F9298" viewBox="0 0 20 20"
						 xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
								d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
								clip-rule="evenodd">
					</path>
				</svg>
			</div>
			<input style="background-color: #C0F3F7; color: #4F9298;" datepicker datepicker-format="yyyy-mm-dd"
						 name="apntDate" type="text"
						 class="border-none text-gray-900 rounded-md block w-full pl-10 p-2.5"
						 placeholder="Select an Appointment" required>
		</div>
		<textarea style="background-color: #C0F3F7; width: 100%" class="border-none rounded-md px-3 py-2" name="message"
							id=""
							cols="30" rows="5" placeholder="Leave a Message :)"></textarea>
	</div>
	<div>
		<x-confirm-button text="Book Now"/>
	</div>
</form>