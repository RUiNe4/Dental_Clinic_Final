@extends('layouts.master')
@section('title', 'Home')
@section('content')
	<style>
      @media only screen and (max-width: 768px) {
          .full {
              display: none;
          }
      }

      @media only screen and (min-width: 768px) {
          .small {
              display: none;
          }
      }

      @media only screen and (max-width: 1100px) {
          .full-2slider {
              display: none;
          }
      }

      @media only screen and (min-width: 1100px) {
          .small-2slider {
              display: none;
          }
      }
	</style>
	<div class="xl:px-20 xl:py-10 text-center xl:text-xl font-medium sm:text-l sm:px-10 sm:py-5">
		<span><br>Get your teeth fixed today with medical professional from cambodia! majoring in computer science, we guarantee your teeth will be white and brighter than our future!</span>
	</div>
	{{--    slider--}}
	{{--    big--}}
	<div id="default-carousel" class="full relative w-full  " data-carousel="slide">
		<!-- Carousel wrapper -->
		<div class="relative overflow-hidden rounded-lg" style="height: 450px">
			<!-- Item 1 -->
			<div class="hidden duration-700 ease-in-out " data-carousel-item>
				<img src="{{ asset ('assets/image/tooth.svg') }}"
						 class="absolute block w-fit -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
			</div>
			<!-- Item 2 -->
			<div class="hidden duration-700 ease-in-out" data-carousel-item>
				<img src="{{ asset ('assets/image/tooth.svg') }}"
						 class="absolute block w-fit -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
			</div>
			<!-- Item 3 -->
			<div class="hidden duration-700 ease-in-out" data-carousel-item>
				<img src="{{ asset ('assets/image/tooth.svg') }}"
						 class="absolute block w-fit -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
			</div>
			<!-- Item 4 -->
			<div class="hidden duration-700 ease-in-out" data-carousel-item>
				<img src="{{ asset ('assets/image/tooth.svg') }}"
						 class="absolute block w-fit -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
			</div>
			<!-- Item 5 -->
			<div class="hidden duration-700 ease-in-out" data-carousel-item>
				<img src="{{ asset ('assets/image/tooth.svg') }}"
						 class="absolute block w-fit -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
			</div>
		</div>
		<!-- Slider indicators -->
		<div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
			<button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
							data-carousel-slide-to="0"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
							data-carousel-slide-to="1"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
							data-carousel-slide-to="2"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
							data-carousel-slide-to="3"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
							data-carousel-slide-to="4"></button>
		</div>
		<!-- Slider controls -->
		<button type="button"
						class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
						data-carousel-prev>
        <span
					class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
								 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
								stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Previous</span>
        </span>
		</button>
		<button type="button"
						class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
						data-carousel-next>
        <span
					class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
								 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
								stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Next</span>
        </span>
		</button>
	</div>
	{{--    small--}}
	<div id="default-carousel" class="small relative w-full" data-carousel="slide">
		<!-- Carousel wrapper -->
		<div class="relative overflow-hidden rounded-lg h-64">
			<!-- Item 1 -->
			<div class="hidden duration-700 ease-in-out " data-carousel-item>
				<img src="{{ asset ('assets/image/tooth.svg') }}"
						 class="absolute block w-fit -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
			</div>
			<!-- Item 2 -->
			<div class="hidden duration-700 ease-in-out" data-carousel-item>
				<img src="{{ asset ('assets/image/tooth.svg') }}"
						 class="absolute block w-fit -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
			</div>
			<!-- Item 3 -->
			<div class="hidden duration-700 ease-in-out" data-carousel-item>
				<img src="{{ asset ('assets/image/tooth.svg') }}"
						 class="absolute block w-fit -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
			</div>
			<!-- Item 4 -->
			<div class="hidden duration-700 ease-in-out" data-carousel-item>
				<img src="{{ asset ('assets/image/tooth.svg') }}"
						 class="absolute block w-fit -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
			</div>
			<!-- Item 5 -->
			<div class="hidden duration-700 ease-in-out" data-carousel-item>
				<img src="{{ asset ('assets/image/tooth.svg') }}"
						 class="absolute block w-fit -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
			</div>
		</div>
		<!-- Slider indicators -->
		<div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
			<button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
							data-carousel-slide-to="0"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
							data-carousel-slide-to="1"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
							data-carousel-slide-to="2"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
							data-carousel-slide-to="3"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
							data-carousel-slide-to="4"></button>
		</div>
		<!-- Slider controls -->
		<button type="button"
						class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
						data-carousel-prev>
        <span
					class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
								 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
								stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Previous</span>
        </span>
		</button>
		<button type="button"
						class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
						data-carousel-next>
        <span
					class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
								 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
								stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Next</span>
        </span>
		</button>
	</div>
	{{--    text--}}
	<div class="h-50 w-full mt-20 mb-10" style="background: #E5FDFF">
		<h2 class="py-5 text-center font-medium text-4xl max-sm:text-3xl" style="color: #55A0A7"> Smile Line Dental
			Clinic</h2>
		<div class="flex justify-center px-5 max-sm:flex-wrap">
			<div class="p-5 ">
				<h2 class="self-center text-center text-xl font-semibold italic underline ">Technology</h2>
				<h2 class="py-5 text-center text-md ">Lorem ipsum dolor sit amet, consectetuer
					adipiscing elit. Aenean commodo ligula eget dolor.
					Aenean massa. </h2>
			</div>
			<div class="p-5 ">
				<h2 class="self-center text-center text-xl font-semibold italic underline ">Quality</h2>
				<h2 class="py-5 text-center text-md">Lorem ipsum dolor sit amet, consectetuer
					adipiscing elit. Aenean commodo ligula eget dolor.
					Aenean massa. </h2>
			</div>
			<div class="p-5 ">
				<h2 class="self-center text-center text-xl font-semibold italic underline ">Customer Care</h2>
				<h2 class="py-5 text-center text-md ">Lorem ipsum dolor sit amet, consectetuer
					adipiscing elit. Aenean commodo ligula eget dolor.
					Aenean massa. </h2>
			</div>
		</div>
	</div>
	{{--    information service--}}
	{{--    big 1--}}
	
	<div class="full flex justify-between ">
		<div class="flex items-center ml-10 mr-10 w-1/2">
			<div class="flex-1 text-black p-2 rounded-2xl relative hover:animate-bounce " style="background: #65C7D0">
				<h2 class="text-center text-2xl pb-3 underline m-5"> Implant</h2>
				<h2 class="pb-10 text-center text-md ">Lorem ipsum dolor sit amet, consectetuer
					adipiscing elit. Aenean commodo ligula eget dolor.
					Aenean massa. </h2>
				<!-- arrow -->
				<div class="absolute -right-4 top-1/2 transform -translate-x-1/2 rotate-45 w-4 h-4"
						 style="background: #65C7D0;"></div>
				<!-- end arrow -->
			</div>
		</div>
		<div class="w-1/2 ml-10 mr-10 p-2 hover:animate-pulse ">
			<img src="{{ asset ('assets/image/image1.png') }}" class="rounded-2xl h-56" alt="avarta"/>
		</div>
	</div>
	{{--    big 2--}}
	<div class="full flex justify-between ">
		<div class="w-1/2 m-10 p-2 hover:animate-pulse ">
			<img src="{{ asset ('assets/image/image2.png') }}" class="rounded-2xl h-56" alt="avarta"/>
		</div>
		<div class="flex items-center m-10 w-1/2">
			<div class="flex-1 text-black p-2 rounded-2xl relative hover:animate-bounce" style="background: #65C7D0">
				<h2 class="text-center text-2xl pb-3 underline m-5"> Implant</h2>
				<h2 class="pb-10 text-center text-md ">Lorem ipsum dolor sit amet, consectetuer
					adipiscing elit. Aenean commodo ligula eget dolor.
					Aenean massa. </h2>
				<!-- arrow -->
				<div class="absolute left-0 top-1/2 transform -translate-x-1/2 rotate-45 w-4 h-4"
						 style="background: #65C7D0;"></div>
				<!-- end arrow -->
			</div>
		</div>
	</div>
	{{--    big 3--}}
	<div class="full flex justify-between ">
		<div class="flex items-center ml-10 mr-10 w-1/2 mb-10">
			<div class="flex-1 text-black p-2 rounded-2xl relative hover:animate-bounce" style="background: #65C7D0">
				<h2 class="text-center text-2xl pb-3 underline m-5"> Implant</h2>
				<h2 class="pb-10 text-center text-md ">Lorem ipsum dolor sit amet, consectetuer
					adipiscing elit. Aenean commodo ligula eget dolor.
					Aenean massa. </h2>
				<!-- arrow -->
				<div class="absolute -right-4 top-1/2 transform -translate-x-1/2 rotate-45 w-4 h-4"
						 style="background: #65C7D0;"></div>
				<!-- end arrow -->
			</div>
		</div>
		<div class="w-1/2 ml-10 mr-10 p-2 mb-10 hover:animate-pulse">
			<img src="{{ asset ('assets/image/image3.png') }}" class="rounded-2xl" alt="avarta"/>
		</div>
	</div>
	{{--    small1--}}
	<div class="small flex-wrap">
		<div class="flex items-center m-10 ">
			<div class="flex-1 text-black p-2 rounded-2xl mb-2 relative hover:animate-bounce" style="background: #65C7D0;">
				<h2 class="text-center text-2xl pb-5 underline "> Implant</h2>
				<h2 class="pb-10 text-center text-md">Lorem ipsum dolor sit amet, consectetuer
					adipiscing elit. Aenean commodo ligula eget dolor.
					Aenean massa. </h2>
				<!-- arrow -->
				<div class="absolute -right-5 top-1/2 transform -translate-x-1/2 rotate-45 w-5 h-5"
						 style="background: #65C7D0;"></div>
				<!-- end arrow -->
			</div>
		</div>
		<div class="flex m-10 hover:animate-pulse">
			<img src="{{ asset ('assets/image/image1.png') }}" class="rounded-2xl h-48 " alt="avarta"/>
		</div>
	</div>
	
	{{--    small 2--}}
	<div class="small flex-wrap">
		<div class="flex items-center m-10 ">
			<div class="flex-1 text-black p-2 rounded-2xl mb-2 relative hover:animate-bounce" style="background: #65C7D0;">
				<h2 class="text-center text-2xl pb-5 underline "> Implant</h2>
				<h2 class="pb-10 text-center text-md">Lorem ipsum dolor sit amet, consectetuer
					adipiscing elit. Aenean commodo ligula eget dolor.
					Aenean massa. </h2>
				<!-- arrow -->
				<div class="absolute left-0 top-1/2 transform -translate-x-1/2 rotate-45 w-5 h-5"
						 style="background: #65C7D0;"></div>
				<!-- end arrow -->
			</div>
		</div>
		<div class="flex m-10 hover:animate-pulse ">
			<img src="{{ asset ('assets/image/image2.png') }}" class="rounded-2xl h-48" alt="avarta"/>
		</div>
	</div>
	{{--    small 3--}}
	<div class="small flex-wrap">
		<div class="flex items-center m-10 ">
			<div class="flex-1 text-blacknp p-2 rounded-2xl mb-2 relative hover:animate-bounce" style="background: #65C7D0;">
				<h2 class="text-center text-xl pb-5 underline "> Implant</h2>
				<h2 class="pb-10 text-center text-md">Lorem ipsum dolor sit amet, consectetuer
					adipiscing elit. Aenean commodo ligula eget dolor.
					Aenean massa. </h2>
				<!-- arrow -->
				<div class="absolute -right-5 top-1/2 transform -translate-x-1/2 rotate-45 w-5 h-5"
						 style="background: #65C7D0;"></div>
				<!-- end arrow -->
			</div>
		</div>
		<div class="flex m-10 hover:animate-pulse">
			<img src="{{ asset ('assets/image/image3.png') }}" class="rounded-2xl h-48" alt="avarta"/>
		</div>
	</div>
	{{--    name doctor--}}
	{{--    big--}}
	<div class="full flex justify-between ">
		<div class="flex items-center ml-10 mr-10 w-1/2 mb-10 ">
			<img src="{{ asset ('assets/image/1.jpg') }}" class="h-40 w-40 mr-6 rounded-full" alt="avarta"/>
			<div class="m-12">
				<span class="mb-6 text-xl font-semibold whitespace-nowrap dark:text-black flex">Dr. Chhay</span>
				<h2 class="flex text-md">Lorem ipsum dolor sit amet, consectetuer
					adipiscing elit. Aenean commodo ligula eget dolor.
					Aenean massa. </h2>
			</div>
		</div>
		<div class="flex items-center ml-10 mr-10 w-1/2 mb-10 ">
			<img src="{{ asset ('assets/image/1.jpg') }}" class="h-40 w-40 mr-6 rounded-full" alt="avarta"/>
			<div class="m-12">
				<span class="mb-6 text-xl font-semibold whitespace-nowrap dark:text-black flex">Dr. Pong</span>
				<h2 class="flex text-md">Lorem ipsum dolor sit amet, consectetuer
					adipiscing elit. Aenean commodo ligula eget dolor.
					Aenean massa. </h2>
			</div>
		</div>
	</div>
	{{--    small--}}
	<div class="small flex-wrap ">
		<div class="flex items-center mt-10 mr-10 ml-10">
			<img src="{{ asset ('assets/image/1.jpg') }}" class="h-40 w-40 mr-6 mt-2 rounded-full" alt="avarta"/>
			<div class="m-12">
				<span class="mb-6 text-xl font-semibold whitespace-nowrap dark:text-black flex">Dr. Chhay</span>
				<h2 class="flex text-md">Lorem ipsum dolor sit amet, consectetuer
					adipiscing elit. Aenean commodo ligula eget dolor.
					Aenean massa. </h2>
			</div>
		</div>
		<div class="small flex-wrap ">
			<div class="flex items-center mb-10 mr-10 ml-10">
				<img src="{{ asset ('assets/image/1.jpg') }}" class="h-40 w-40 mr-6 mt-2 rounded-full" alt="avarta"/>
				<div class="m-12">
					<span class="mb-6 text-xl font-semibold whitespace-nowrap dark:text-black flex">Dr. Pong</span>
					<h2 class="flex text-md">Lorem ipsum dolor sit amet, consectetuer
						adipiscing elit. Aenean commodo ligula eget dolor.
						Aenean massa. </h2>
				</div>
			</div>
		</div>
	</div>
	{{--    2slider--}}
	{{--    big--}}
	<div id="default-carousel" class="full-2slider relative w-full mb-10 " data-carousel="slide">
		<!-- Carousel wrapper -->
		<div class="relative overflow-hidden rounded-lg " style="height: 500px">
			<!-- Item 1 -->
			<div class="hidden duration-700 ease-in-out" data-carousel-item style="background: #51B1BA">
				<h2 class="py-7 xl:py-10 text-center font-medium text-4xl text-white"> Client Testimonials</h2>
				<div class="flex justify-center px-5 max-sm:flex-wrap xl:pt-5">
					<div class="p-5 rounded-2xl ml-20 mr-20 mb-20 bg-white ">
						<div class="flex items-center m-5 ">
							<img src="{{ asset ('assets/image/image4.png') }}" class=" mt-6 w-40 mr-6" alt="avarta"/>
							<div>
								<h2 class="flex text-md pl-6">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
									said a patient 2023 </h2>
							</div>
						</div>
					</div>
					<div class="p-5 rounded-2xl ml-20 mr-20 mb-20 bg-white ">
						<div class="flex items-center m-5 ">
							<img src="{{ asset ('assets/image/image5.png') }}" class=" mt-6 w-40 mr-6 " alt="avarta"/>
							<div>
								<h2 class="flex text-md pl-6">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
									said a patient 2023 </h2>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Item 2 -->
			<div class="hidden duration-700 ease-in-out" data-carousel-item style="background: #51B1BA">
				<h2 class="py-7 xl:py-10 text-center font-medium text-4xl text-white"> Client Testimonials</h2>
				<div class="flex justify-center px-5 max-sm:flex-wrap xl:pt-5">
					<div class="p-5 rounded-2xl ml-20 mr-20 mb-20 bg-white ">
						<div class="flex items-center m-5 ">
							<img src="{{ asset ('assets/image/image4.png') }}" class=" mt-6 w-40 mr-6" alt="avarta"/>
							<div>
								<h2 class="flex text-md pl-6">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
									said a patient 2023 </h2>
							</div>
						</div>
					</div>
					<div class="p-5 rounded-2xl ml-20 mr-20 mb-20 bg-white ">
						<div class="flex items-center m-5 ">
							<img src="{{ asset ('assets/image/image5.png') }}" class=" mt-6 w-40 mr-6 " alt="avarta"/>
							<div>
								<h2 class="flex text-md pl-6">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
									said a patient 2023 </h2>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Item 3 -->
			<div class="hidden duration-700 ease-in-out" data-carousel-item style="background: #51B1BA">
				<h2 class="py-7 xl:py-10 text-center font-medium text-4xl text-white"> Client Testimonials</h2>
				<div class="flex justify-center px-5 max-sm:flex-wrap xl:pt-5">
					<div class="p-5 rounded-2xl ml-20 mr-20 mb-20 bg-white ">
						<div class="flex items-center m-5 ">
							<img src="{{ asset ('assets/image/image4.png') }}" class=" mt-6 w-40 mr-6" alt="avarta"/>
							<div>
								<h2 class="flex text-md pl-6">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
									said a patient 2023 </h2>
							</div>
						</div>
					</div>
					<div class="p-5 rounded-2xl ml-20 mr-20 mb-20 bg-white ">
						<div class="flex items-center m-5 ">
							<img src="{{ asset ('assets/image/image5.png') }}" class=" mt-6 w-40 mr-6 " alt="avarta"/>
							<div>
								<h2 class="flex text-md pl-6">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
									said a patient 2023 </h2>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Item 4 -->
			<div class="hidden duration-700 ease-in-out" data-carousel-item style="background: #51B1BA">
				<h2 class="py-7 xl:py-10 text-center font-medium text-4xl text-white"> Client Testimonials</h2>
				<div class="flex justify-center px-5 max-sm:flex-wrap xl:pt-5">
					<div class="p-5 rounded-2xl ml-20 mr-20 mb-20 bg-white ">
						<div class="flex items-center m-5 ">
							<img src="{{ asset ('assets/image/image4.png') }}" class=" mt-6 w-40 mr-6" alt="avarta"/>
							<div>
								<h2 class="flex text-md pl-6">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
									said a patient 2023 </h2>
							</div>
						</div>
					</div>
					<div class="p-5 rounded-2xl ml-20 mr-20 mb-20 bg-white ">
						<div class="flex items-center m-5 ">
							<img src="{{ asset ('assets/image/image5.png') }}" class=" mt-6 w-40 mr-6 " alt="avarta"/>
							<div>
								<h2 class="flex text-md pl-6">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
									said a patient 2023 </h2>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Item 5 -->
			<div class="hidden duration-700 ease-in-out" data-carousel-item style="background: #51B1BA">
				<h2 class="py-7 xl:py-10 text-center font-medium text-4xl text-white"> Client Testimonials</h2>
				<div class="flex justify-center px-5 max-sm:flex-wrap xl:pt-5">
					<div class="p-5 rounded-2xl ml-20 mr-20 mb-20 bg-white ">
						<div class="flex items-center m-5 ">
							<img src="{{ asset ('assets/image/image4.png') }}" class=" mt-6 w-40 mr-6" alt="avarta"/>
							<div>
								<h2 class="flex text-md pl-6">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
									said a patient 2023 </h2>
							</div>
						</div>
					</div>
					<div class="p-5 rounded-2xl ml-20 mr-20 mb-20 bg-white ">
						<div class="flex items-center m-5 ">
							<img src="{{ asset ('assets/image/image5.png') }}" class=" mt-6 w-40 mr-6 " alt="avarta"/>
							<div>
								<h2 class="flex text-md pl-6">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
									said a patient 2023 </h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Slider indicators -->
		<div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
			<button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
							data-carousel-slide-to="0"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
							data-carousel-slide-to="1"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
							data-carousel-slide-to="2"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
							data-carousel-slide-to="3"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
							data-carousel-slide-to="4"></button>
		</div>
		<!-- Slider controls -->
		<button type="button"
						class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
						data-carousel-prev>
        <span
					class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
								 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
								stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Previous</span>
        </span>
		</button>
		<button type="button"
						class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
						data-carousel-next>
        <span
					class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
								 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
								stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Next</span>
        </span>
		</button>
	</div>
	{{--small?--}}
	
	<div id="default-carousel" class="small-2slider relative w-full " data-carousel="slide">
		<!-- Carousel wrapper -->
		<div class="relative overflow-hidden rounded-lg" style="height: 660px">
			<!-- Item 1 -->
			<div class="hidden duration-700 ease-in-out " data-carousel-item style="background: #51B1BA">
				<h2 class="py-7 text-center font-medium text-2xl text-white">Client Testimonials</h2>
				<div class="flex-wrap px-5 xl:pt-5">
					<div class="p-5 rounded-2xl ml-10 mr-10 mb-10 bg-white ">
						<div class="flex justify-center">
							<img src="{{ asset ('assets/image/image4.png') }}" class=" w-32 mb-5" alt="avarta"/>
						</div>
						<div class="flex justify-center">
							<h2 class="flex text-md">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
								said a patient 2023 </h2>
						</div>
					</div>
					<div class="p-5 rounded-2xl ml-10 mr-10 mb-5 bg-white ">
						<div class="flex justify-center">
							<img src="{{ asset ('assets/image/image5.png') }}" class=" w-32 mb-5" alt="avarta"/>
						</div>
						<div class="flex justify-center">
							<h2 class="flex text-md ">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
								said a patient 2023 </h2>
						</div>
					</div>
				</div>
			</div>
			<!-- Item 2 -->
			<div class="hidden duration-700 ease-in-out " data-carousel-item style="background: #51B1BA">
				<h2 class="py-7 text-center font-medium text-2xl text-white">Client Testimonials</h2>
				<div class="flex-wrap px-5 xl:pt-5">
					<div class="p-5 rounded-2xl ml-10 mr-10 mb-10 bg-white ">
						<div class="flex justify-center">
							<img src="{{ asset ('assets/image/image4.png') }}" class=" w-32 mb-5" alt="avarta"/>
						</div>
						<div class="flex justify-center">
							<h2 class="flex text-md">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
								said a patient 2023 </h2>
						</div>
					</div>
					<div class="p-5 rounded-2xl ml-10 mr-10 mb-5 bg-white ">
						<div class="flex justify-center">
							<img src="{{ asset ('assets/image/image5.png') }}" class=" w-32 mb-5" alt="avarta"/>
						</div>
						<div class="flex justify-center">
							<h2 class="flex text-md ">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
								said a patient 2023 </h2>
						</div>
					</div>
				</div>
			</div>
			{{--            <!-- Item 3 -->--}}
			<div class="hidden duration-700 ease-in-out " data-carousel-item style="background: #51B1BA">
				<h2 class="py-7 text-center font-medium text-2xl text-white">Client Testimonials</h2>
				<div class="flex-wrap px-5 xl:pt-5">
					<div class="p-5 rounded-2xl ml-10 mr-10 mb-10 bg-white ">
						<div class="flex justify-center">
							<img src="{{ asset ('assets/image/image4.png') }}" class=" w-32 mb-5" alt="avarta"/>
						</div>
						<div class="flex justify-center">
							<h2 class="flex text-md">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
								said a patient 2023 </h2>
						</div>
					</div>
					<div class="p-5 rounded-2xl ml-10 mr-10 mb-5 bg-white ">
						<div class="flex justify-center">
							<img src="{{ asset ('assets/image/image5.png') }}" class=" w-32 mb-5" alt="avarta"/>
						</div>
						<div class="flex justify-center">
							<h2 class="flex text-md ">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
								said a patient 2023 </h2>
						</div>
					</div>
				</div>
			</div>
			{{--            <!-- Item 4 -->--}}
			<div class="hidden duration-700 ease-in-out " data-carousel-item style="background: #51B1BA">
				<h2 class="py-7 text-center font-medium text-2xl text-white">Client Testimonials</h2>
				<div class="flex-wrap px-5 xl:pt-5">
					<div class="p-5 rounded-2xl ml-10 mr-10 mb-10 bg-white ">
						<div class="flex justify-center">
							<img src="{{ asset ('assets/image/image4.png') }}" class=" w-32 mb-5" alt="avarta"/>
						</div>
						<div class="flex justify-center">
							<h2 class="flex text-md">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
								said a patient 2023 </h2>
						</div>
					</div>
					<div class="p-5 rounded-2xl ml-10 mr-10 mb-5 bg-white ">
						<div class="flex justify-center">
							<img src="{{ asset ('assets/image/image5.png') }}" class=" w-32 mb-5" alt="avarta"/>
						</div>
						<div class="flex justify-center">
							<h2 class="flex text-md ">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
								said a patient 2023 </h2>
						</div>
					</div>
				</div>
			</div>
			{{--            <!-- Item 5 -->--}}
			<div class="hidden duration-700 ease-in-out " data-carousel-item style="background: #51B1BA">
				<h2 class="py-7 text-center font-medium text-2xl text-white">Client Testimonials</h2>
				<div class="flex-wrap px-5 xl:pt-5">
					<div class="p-5 rounded-2xl ml-10 mr-10 mb-10 bg-white ">
						<div class="flex justify-center">
							<img src="{{ asset ('assets/image/image4.png') }}" class=" w-32 mb-5" alt="avarta"/>
						</div>
						<div class="flex justify-center">
							<h2 class="flex text-md">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
								said a patient 2023 </h2>
						</div>
					</div>
					<div class="p-5 rounded-2xl ml-10 mr-10 mb-5 bg-white ">
						<div class="flex justify-center">
							<img src="{{ asset ('assets/image/image5.png') }}" class=" w-32 mb-5" alt="avarta"/>
						</div>
						<div class="flex justify-center">
							<h2 class="flex text-md ">“my teeth straighter now :D <br>thanks to doctor Za Chan”<br><br>
								said a patient 2023 </h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Slider indicators -->
		<div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
			<button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
							data-carousel-slide-to="0"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
							data-carousel-slide-to="1"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
							data-carousel-slide-to="2"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
							data-carousel-slide-to="3"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
							data-carousel-slide-to="4"></button>
		</div>
		<!-- Slider controls -->
		<button type="button"
						class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
						data-carousel-prev>
        <span
					class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
								 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
								stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Previous</span>
        </span>
		</button>
		<button type="button"
						class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
						data-carousel-next>
        <span
					class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
								 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
								stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Next</span>
        </span>
		</button>
	</div>

@endsection

