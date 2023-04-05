@if ($doctor['acc_type'] == 'Doctor')
	<div class="mb-24 md:mb-0">
		<a href="/our-doctor/{{ $doctor->id }}">
			<div class="rounded-lg border shadow-lg h-full block bg-white">
				<div class="flex justify-center">
					<div class="flex justify-center" style="margin-top: -75px">
						<img src="{{ $doctor->photo ? asset('storage/' . $doctor->photo) : asset ('assets/image/1.jpg') }}"
								 class="mx-auto shadow-lg" alt=""
								 style="border-radius: 50%; width:200px; height: 200px; object-fit: cover"/>
					</div>
				</div>
				<div class="p-6">
					<h5 class="text-black text-lg font-bold mb-4">
						{{ $doctor->title }} {{ $doctor->name }}
						<br>
						<div class="text-sm text-black">
							Specialized in <i class="fa fa-arrow-right"></i> {{ $doctor->specialist }}
						</div>
					</h5>
					<p class="mb-6">{{ $doctor->description }}</p>
					
					<!-- Small icons here -->
					<ul class="list-inside flex mx-auto justify-center">
						<a href="#!" class="px-2"><i class="fa-solid fa-phone fa-xl"></i></a>
						<a href="#!" class="px-2"><i class="fa-brands fa-telegram fa-xl"
																				 style="color: #0088cc;"></i></a>
						<a href="#!" class="px-2"><i class="fa-brands fa-square-whatsapp fa-xl"
																				 style="color: #25d366;"></i>
						</a>
					</ul>
					<!-- Small icons here -->
				</div>
			</div>
		</a>
	
	</div>
@endif
