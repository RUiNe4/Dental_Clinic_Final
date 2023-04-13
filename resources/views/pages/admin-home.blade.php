@extends('layouts.admin')
@section('content')
	<div class="col-md-3 widget widget1">
		<div class="r3_counter_box">
			<a href="{{ url('/doctor/patient-list/desc?filter=unpaid') }}">
				<i class="pull-left fa fa-users dollar2 icon-rounded"></i>
				<div class="stats">
					<h5>
						<strong>{{ \App\Models\Appointment::where(['appointedDoctor' => auth()->user ()->name, 'status' => 'PENDING'])->count() }}</strong>
					</h5>
					<span>Pending Patients</span>
				</div>
			</a>
		</div>
	</div>
	
	<div class="col-md-3 widget widget1">
		<div class="r3_counter_box">
			<i class="pull-left fa fa-dollar icon-rounded"></i>
			<div class="stats">
				<h5><strong>{{ $revenue }}$</strong></h5>
				<span>Total Revenue</span>
			</div>
		</div>
	</div>
	
	<canvas id="myChart" height="100px"></canvas>
	@include('profile.partials.revenue-chart')

@endsection

