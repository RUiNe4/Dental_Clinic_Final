<div class="w-full justify-start items-start my-2">
	<div class="w-full  my-1">
		@if( count($invoice_items) > 0)
			<ul class="flex flex-col">
				@for($i = 0; $i < count($invoice_items);$i++)
					<li class="border-l-4 border-[#4F9298] shadow-md bg-white my-2 px-8 py-4" x-data="accordion({{ $invoice_items[$i][0]->id }})">
						<h2 class="flex flex-row justify-between items-center font-semibold cursor-pointer" @click="handleClick()">
							<span style="color:#4F9298">
									<div class="font-bold">
{{--										 {{ $invoice_items[$i][0]->invoice_id }}--}}
										{{ $invoices[$i]->patient_name }}
										<i class="fa fa-long-arrow-right"></i>
										<span class="text-xs font-bold ">{{ $invoices[0]->date }} </span>
									</div>
								<div>
									<span class="font-normal text-sm">Total: </span> <span class="text-sm">${{ $invoices[$i]->amount }}</span>
								</div>
							</span>
							<div class="flex items-center gap-2">
								<span style="color:#4F9298">
									<div class="font-bold">
										 Invoice {{ $invoice_items[$i][0]->invoice_id }}
									</div>
									<div class="text-xs"></div>
							</span>
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
								 class="border-l-2 border-gray-700 overflow-hidden max-h-0 duration-500 transition-all px-3">
							<table class="w-full text-sm text-left text-gray-500">
								<thead class="text-xs text-gray-700 uppercase">
								<tr>
									<th scope="col" class="px-6 py-3">
										Treatment
									</th>
									<th scope="col" class="px-6 py-3">
										Qty
									</th>
									<th scope="col" class="px-6 py-3">
										Price
									</th>
									<th scope="col" class="px-6 py-3">
										Amount
									</th>
								</tr>
								</thead>
								<tbody>
								@for($j =0 ;$j<count($invoice_items[$i]); $j++)
									<tr class="bg-white border-b">
										<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
											{{ $invoice_items[$i][$j]->treatment_name }}
										</th>
										<td class="px-6 py-4">
											{{ $invoice_items[$i][$j]->qty }}
										</td>
										<td class="px-6 py-4">
											{{ $invoice_items[$i][$j]->price }}
										</td>
										<td class="px-6 py-4">
											{{ $invoice_items[$i][$j]->amount }}
										</td>
									</tr>
								@endfor
								</tbody>
							</table>
						</div>
					</li>
				@endfor
			</ul>
		@endif
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
