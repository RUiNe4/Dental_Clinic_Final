<div class="left-section flex flex-col" style="color: #4F9298">
{{--	@dd(request()->path())--}}
	<a href="{{ request ()->path () == 'doctor/mailbox' ? url('/doctor/mailbox/'.$patient->id) : url('/appointment/' . $patient->id) }}" class="font-bold">
		{{ $patient->firstName }} {{ $patient->lastName }}
		<sup class="font-normal italic">
			#{{ $patient->id }}
		</sup>
	</a>
	<div class="text-xs">
		<span class="underline">Phone No</span> >>> <span class="italic font-bold">{{ $patient->phoneNum }}</span>
	</div>
	<div class="text-sm">
		Appointment Date <i class="fa fa-long-arrow-right"></i>
		<span class="text-xs font-bold ">{{ $patient->appointmentDate }} |</span>
		<a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $patient->email }}" target="_blank"
			 class="text-sm hover:underline hover:cursor-pointer">
			{{ $patient->email }}
			<i class="fa fa-mail-reply"> </i>
		</a>
	</div>
</div>




