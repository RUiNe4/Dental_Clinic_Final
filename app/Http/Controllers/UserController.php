<?php
	
	namespace App\Http\Controllers;
	
	
	use App\Models\Appointment;
	use App\Models\Invoice;
	use App\Models\invoice_items;
	use App\Models\Treatment;
	use App\Models\User;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Validation\Rule;
	
	class UserController extends AdminController
	{
		public function index ()
		{
			if ( Auth ::check () ) {
				if ( auth () -> user () -> acc_type == 'Doctor' ) {
					// The user is logged in...
//					$patients = Appointment ::where ( 'appointedDoctor' , auth () -> user () -> name ) -> paginate ( 6 );
					$doctors = User ::all ();
					$countMail = count ( Appointment ::where ( 'appointedDoctor' , null ) -> get () );
					
					return view ( 'layouts.admin' , compact ( 'countMail' , 'doctors' ) );
				} else {
					auth ::logout ();
					return view ( 'pages.login' );
				}
			} else {
				auth ::logout ();
				return view ( 'pages.login' );
			}
		}
		
		public function register ()
		{
			return view ( 'pages.register' );
		}
		
		public function store ( Request $request )
		{
			$formField = $request -> validate ( [
				'name' => 'required|string|min:3' ,
				'email' => [ 'required' , 'email' , Rule ::unique ( 'users' , 'email' ) ] ,
				'password' => 'required|confirmed|min:6' ,
				'title' => 'required' ,
				'specialist' => 'required' ,
				'description' => 'required' ,
				'work_experience' => 'required' ,
			] );
			$formField[ 'acc_type' ] = 'Doctor';
			if ( $request -> hasFile ( 'photo' ) ) {
				$formField[ 'photo' ] = $request -> file ( 'photo' ) -> store ( 'photos' , 'public' );
			}
			//Hash Password
			$formField[ 'password' ] = bcrypt ( $formField[ 'password' ] );
			
			$user = User ::create ( $formField );
			
			//Login
			return redirect ( '/' ) -> with ( 'message' , 'User created and logged in' );
		}
		
		public function login ( Request $request )
		{
			auth () -> logout ();
			$request -> session () -> invalidate ();
			$request -> session () -> regenerateToken ();
			
			return view ( 'pages.login' );
		}
		
		public function authenticate ( Request $request )
		{
			$formField = $request -> validate ( [
				'email' => [ 'required' , 'email' ] ,
				'password' => 'required' ,
			] );
			if ( auth () -> attempt ( $formField ) ) {
				$request -> session () -> regenerate ();
				if ( auth () -> user () -> acc_type == 'Doctor' ) {
					return redirect ( '/doctor' );
				} else {
					return redirect ( '/admin' );
				}
			} else {
				return back () -> withErrors ( [ 'email' => 'Invalid Credentials' ] ) -> onlyInput ( 'email' );
			}
		}
		
		public function logout ( Request $request )
		{
			auth () -> logout ();
			$request -> session () -> invalidate ();
			$request -> session () -> regenerateToken ();
			
			return redirect ( '/login' );
		}
		
		public function patientInfo ( Appointment $appointment )
		{
			$doctors = User ::latest () -> paginate ( 6 );
			$patients = Appointment ::where ( [
				'appointedDoctor' => auth () -> user () -> name ,
				'status' => 'Approve' ,
			] ) -> paginate ( 6 );
			$invoices = Invoice ::where ( 'patient' , $appointment -> firstName . ' ' . $appointment -> lastName ) -> orderby ( 'id' , 'desc' ) -> get ();
			$invoice_items = array ();
			
			foreach ( $invoices as $invoice ) {
				$invoice_items[] = invoice_items ::where ( 'invoice_id' , $invoice -> id )
					-> get ();
			}
			
			return view ( 'pages.patient-info' , compact ( 'invoice_items' , 'patients' , 'appointment' , 'doctors' ) );
		}
		
		public function myPatients ( Auth $auth )
		{
			$doctors = User ::latest () -> paginate ( 6 );
			$patients = Appointment ::where ( [
				'appointedDoctor' => auth () -> user () -> name ,
				'status' => 'Approve' ,
			] ) -> paginate ( 6 );
			$countMail = count ( Appointment ::where ( 'appointedDoctor' , null ) -> get () );
			
			return view ( 'pages.patient-list' , compact ( 'countMail' , 'patients' , 'doctors' ) );
		}
		
		public function search ()
		{
			$countMail = count ( Appointment ::where ( 'appointedDoctor' , null ) -> get () );
			$doctors = User ::all ();
			$search = request () -> query ( 'appointment' );
			if ( $search == '' ) {
				return redirect ( '/doctor/patient-list' );
			}
			if ( $search ) {
				$patients = Appointment ::where ( 'firstName' , 'like' , "%{$search}%" )
					-> orwhere ( 'lastName' , 'like' , "%{$search}%" )
					-> orwhere ( 'id' , 'like' , "%{$search}%" )
					-> having ( 'appointedDoctor' , '=' , auth () -> user () -> name )
					-> paginate ( 6 );
			} else {
				$patients = Appointment ::where ( 'appointedDoctor' , auth () -> user () -> name ) -> paginate ( 6 );
			}
			
			return view ( 'pages.patient-list' , compact ( 'countMail' , 'patients' , 'doctors' ) );
		}
		
		public function change ( Request $request , Appointment $appointment )
		{
			switch ( $request[ 'res' ] ) {
				case 'reschedule':
					$appointment -> appointmentDate = $request[ 'apntDate' ];
					if ( $request[ 'phoneNum' ] != null ) {
						$appointment -> phoneNum = $request[ 'phoneNum' ];
					}
					if ( $request[ 'cb' ] == 'check' ) {
						$this -> mail ( $appointment -> email , 'Using Reschedule from patient info
					New Date: ' . $request[ 'apntDate' ] );
					}
					
					$appointment -> update ();
					return redirect () -> back ();
				case 'delete':
					if ( $request[ 'cb' ] == 'check' ) {
						$this -> mail ( $appointment -> email , 'Using Cancel appointment from patient info' );
					}
					$appointment -> delete ();
					if ( $appointment -> status == 'PENDING' && \auth () -> user () -> acc_type == 'Doctor' ) {
						return redirect ( '/doctor/mailbox' );
					} elseif ( \auth () -> user () -> acc_type == 'admin' ) {
						return redirect ( '/admin/mailbox/' . $appointment -> appointedDoctor );
					} else {
						return redirect ( '/doctor/patient-list' );
					}
				default:
					return abort ( '404' );
			}
		}
	}
	
	//{{$user->photo ? asset ('storage/' . $user->photo) : asset('/image/1.jpg)}}
