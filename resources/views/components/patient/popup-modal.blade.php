<div class="w-full flex justify-start items-start my-2">
	<div class="w-full sm:w-10/12 md:w-1/2 my-1">
		<ul class="flex flex-col">
			<li class="bg-white my-2" x-data="accordion({{ $patient->id }})">
				<h2 class="flex flex-row justify-between items-center font-semibold cursor-pointer" @click="handleClick()">
            <span style="color:#4F9298">
                <a
									href="{{ request()->path() == 'doctor/mailbox' ? url('/doctor/mailbox/' . $patient->id) : url('/appointment/' . $patient->id) }}"
									class="font-bold">
                    {{ $patient->firstName }} {{ $patient->lastName }}
                    <sup class="font-normal italic">
                        #{{ $patient->id }}
                    </sup>
                </a>
                <div class="text-xs">
                    <span class="underline">Phone No</span> >>> <span
										class="italic font-bold">{{ $patient->phoneNum }}</span>
                </div>
                <div class="text-sm">
                    Appointment Date <i class="fa fa-long-arrow-right"></i>
                    <span class="text-xs font-bold ">{{ $patient->appointmentDate }} |</span>
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $patient->email }}"
											 target="_blank" class="text-sm hover:underline hover:cursor-pointer">
                        {{ $patient->email }}
                        <i class="fa fa-mail-reply"> </i>
                    </a>
                </div>
            </span>
					<div class="flex items-center gap-2">
						<div style="color: #4F9298" class="text-md">
							Payment status <i class="fa fa-long-arrow-right"></i>
							<span
								class="text-xs font-bold {{ $patient->paid ? 'text-green-500' : 'text-amber-500' }}">{{ $patient->paid ? 'PAID' : 'PENDING' }} </span>
						</div>
						<svg :class="handleRotate()" fill="#4F9298"
								 class="text-purple-700 h-6 w-6 transform transition-transform duration-500"
								 viewBox="0 0 20 20">
							<path
								d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
							</path>
						</svg>
					</div>
				</h2>
				<div x-ref="tab" :style="handleToggle()"
						 class="border-l-2 border-[#4F9298] overflow-hidden max-h-0 duration-500 transition-all">
					<p class="p-3 text-gray-900">
						{{ $patient->message }}
					</p>

					<form action="/appointment/{{ $patient->id }}/change">
						<div class="p-6 space-y-6">
							<x-date-picker :patient="$patient"/>
						</div>
						<!-- Modal footer -->
						<div class="flex items-center p-6 space-x-2 border-gray-200 rounded-b dark:border-gray-600">
							<button data-modal-hide="staticModal" type="submit" name="res" value="reschedule"
											style="background-color: #4F9298"
											class="text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
								Reschedule
							</button>
							<button data-modal-hide="staticModal" type="submit" name="res" value="delete"
											class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
								Remove
							</button>
							@if ($patient->paid == 0)
								<button data-modal-hide="staticModal" type="submit" name="res" value="paid"
												class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 whitespace-nowrap">
									Pay now
								</button>
							@else
								<button data-modal-hide="staticModal" type="submit" name="res" value="paid"
												class="text-white bg-amber-700 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5  focus:z-10"
												disabled>
									PAID
								</button>
							@endif

							<x-checkbox :patient="$patient"/>
						</div>
					</form>
				</div>
			</li>
		</ul>
	</div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('accordion', {
            tab: 0
        });

        Alpine.data('accordion', (idx) => ({
            init() {
                this.idx = idx;
            },
            idx: -1,
            handleClick() {
                this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
            },
            handleRotate() {
                return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
            },
            handleToggle() {
                return this.$store.accordion.tab === this.idx ?
                    `max-height: ${this.$refs.tab.scrollHeight}px` : '';
            }
        }));
    })
</script>
