@extends('layouts.admin')
@section('content')
	<div class="col-md-3 widget widget1">
		<div class="r3_counter_box">
			<a href="{{ url('/doctor/patient-list') }}">
				<i class="pull-left fa fa-users dollar2 icon-rounded"></i>
				<div class="stats">
					<h5><strong>{{ \App\Models\Appointment::where(['appointedDoctor' => auth()->user ()->name, 'status' => 'Approve'])->count() }}</strong></h5>
					<span>Total Patients</span>
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

@endsection

