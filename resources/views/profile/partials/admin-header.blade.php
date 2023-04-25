<div class="sticky-header header-section pb-2">
	<div class="header-left">
		<!--toggle button start-->
		<button style="background-color: #65C7D0" id="showLeftPush"><i class="fa fa-bars"></i></button>
		<!--toggle button end-->
		<div class="profile_details_left">
			<div class="clearfix"></div>
		</div>
		<!--notification menu end -->
		<div class="clearfix"></div>
	</div>
	<div class="header-right">

		<!--search-box-->
		<div class="search-box">
			<form
				action="{{ auth()->user()->acc_type == 'admin' ? '/admin/search' : '/doctor/search' }}"
				class="input">
				<input name="appointment" value="{{ request()->query('appointment') }}"
							 class="sb-search-input input__field--madoka" placeholder="Search Name..." type="search"
							 id="input-31"/>
				<label class="input__label" for="input-31">
					<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
						<path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
					</svg>
				</label>
			</form>
		</div>
		<!--//end-search-box-->

		<div class="profile_details">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<div class="profile_img">
							<span class="prfil-img">
                                <img style="border-radius: 50%; width:50px; height: 50px; object-fit: cover" src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : asset ('assets/image/1.jpg') }}" alt="">
                            </span>
							<div class="user-name">
								@auth()
									<p>{{ auth()->user()->name }}</p>
									<span>{{ auth()->user()->acc_type }}</span>
								@endauth
							</div>
							<i class="fa fa-angle-down lnr"></i>
							<i class="fa fa-angle-up lnr"></i>
							<div class="clearfix"></div>
						</div>
					</a>
					<ul class="dropdown-menu drp-mnu">
						<li>
							<a href="#">
								<form action="/logout" method="POST" class="inline">
									@csrf
									<i class="fa fa-sign-out"></i>
									<input type="submit" value="Logout">
								</form>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
</div>
