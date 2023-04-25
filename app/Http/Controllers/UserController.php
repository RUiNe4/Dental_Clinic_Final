<?php

    namespace App\Http\Controllers;

    use App\Models\Appointment;
    use App\Models\Invoice;
    use App\Models\invoice_items;
    use App\Models\User;
    use Carbon\Carbon;
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
                    $patients = Appointment ::where ( 'appointedDoctor' , auth () -> user () -> name ) -> paginate ( 6 );
                    $doctors = User ::all ();
                    $countMail = count ( Appointment ::where ( 'appointedDoctor' , null ) -> get () );
                    $revenue = Invoice :: sum ( 'amount' );

                    $invoices = Invoice ::select ( 'amount' , DB ::raw ( 'TIMESTAMP(date) as day' ) )
                        -> where ( DB ::raw ( 'DAY(date)' ) , '<' , 30 )
                        -> orderBy ( 'day' , 'asc' )
                        -> pluck ( 'amount' , 'day' );

                    $labels = $invoices -> keys ();
                    $data = $invoices -> values ();

                    //					dd($data);

                    return view ( 'pages.admin-home' , compact ( 'patients' , 'countMail' , 'doctors' , 'revenue' , 'labels' , 'data' ) );
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
//                'specialist' => 'required' ,
//                'description' => 'required' ,
//                'work_experience' => 'required' ,
            ] );
            $formField[ 'acc_type' ] = 'Doctor';
            if ( $request -> hasFile ( 'photo' ) ) {
                $formField[ 'photo' ] = $request -> file ( 'photo' ) -> store ( 'photos' , 'public' );

            }
            //Hash Password
            $formField[ 'password' ] = bcrypt ( $formField[ 'password' ] );

            $user = User ::create ( $formField );

            //Login
            return redirect ('/admin') -> with ( 'message' , 'User created and logged in' );
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
            $invoices = Invoice ::where ( 'patient_name' , $appointment -> firstName . ' ' . $appointment -> lastName ) -> orderby ( 'id' , 'desc' ) -> get ();
            $invoice_items = [];

            foreach ( $invoices as $invoice ) {
                $invoice_items[] = invoice_items ::where ( 'invoice_id' , $invoice -> id )
                    -> get ();
            }

            return view ( 'pages.patient-info' , compact ( 'invoice_items' , 'patients' , 'appointment' , 'doctors' , 'invoices' ) );
        }

        public function myPatients ( Auth $auth )
        {
            $sort = \request ( 'sort' , 'asc' );
            $doctors = User ::latest () -> paginate ( 6 );
            $patients = Appointment ::where ( [
                'appointedDoctor' => auth () -> user () -> name ,
                'status' => 'Approve' ,
            ] )
                -> paginate ( 6 );

            $invoices = Invoice ::select ( 'amount' , DB ::raw ( 'DAY(date) as day' ) )
//						->where(DB::raw ("DAY(date)"),'',Carbon::now ())
                -> orderBy ( 'day' , 'asc' )
                -> pluck ( 'amount' , 'day' );

            $labels = $invoices -> keys ();
            $data = $invoices -> values ();

            return view ( 'pages.patient-list' , compact ( 'sort' , 'patients' , 'doctors' , 'labels' , 'data' ) );
        }

        public function search ()
        {
            $sort = \request ( 'sort' , 'asc' );
            $countMail = count ( Appointment ::where ( 'appointedDoctor' , null ) -> get () );
            $doctors = User ::all ();
            $search = request () -> query ( 'appointment' );
            if ( $search == '' ) {
                return redirect ( '/doctor/patient-list' );
            }
            if ( $search ) {
                $patients = Appointment ::where ( DB ::raw ( 'CONCAT_WS(" ", firstName, lastName)' ) , 'like' , "%{$search}%" )
                    -> orwhere ( 'id' , 'like' , "%{$search}%" )
                    -> having ( 'appointedDoctor' , '=' , auth () -> user () -> name )
                    -> paginate ( 6 );
            } else {
                $patients = Appointment ::where ( 'appointedDoctor' , auth () -> user () -> name ) -> paginate ( 6 );
            }

            return view ( 'pages.patient-list' , compact ( 'sort' , 'countMail' , 'patients' , 'doctors' ) );
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
                        $this -> mail ( $appointment -> email , 'Greetings ' . $appointment -> firstName . ' ' . $appointment -> lastName . '.

Unfortunately your appointed doctor is not available on the time you have requested for an appointment , therefore your appointment has been moved to ' . $request[ 'apntDate' ] . '.

Please let us know if you are able accept the appointment by sending us an email or contact the number below
098 233 324.

Thank you for booking your appointment with SmilelineClinic!
 ' );
                    }
                    $appointment -> paid = 0;
                    $appointment -> update ();

                    return redirect () -> back ();
                case 'delete':
                    if ( $request[ 'cb' ] == 'check' ) {
                        $this -> mail ( $appointment -> email , 'Greetings ' . $appointment -> firstName . ' ' . $appointment -> lastName . ',

Unfortunately your appointed doctor is not available on the time you have requested for an appointment, therefore your appointment has been declined.

Please let us know if you would like to rebook the appointment by go to our website or contact the number below
098 233 324.

Thank you for booking your appointment with SmilelineClinic!
' );
                    }
                    $appointment -> delete ();
                    if ( $appointment -> status == 'PENDING' && \auth () -> user () -> acc_type == 'Doctor' ) {
                        return redirect ( '/doctor/mailbox' );
                    } elseif ( \auth () -> user () -> acc_type == 'admin' ) {
                        return redirect ( '/admin/mailbox/' . $appointment -> appointedDoctor );
                    } else {
                        return redirect ( '/doctor/patient-list' );
                    }
                case 'paid':
//                    return 'hello';
                    return redirect ( '/create/invoice/' . $appointment -> id );
                default:
                    return abort ( '404' );
            }
        }

        public function invoice_record ()
        {
            //			$doctors = User ::latest () -> paginate ( 6 );
            $patients = Appointment ::where ( [
                'appointedDoctor' => auth () -> user () -> name ,
                'status' => 'Approve' ,
                'paid' => 1 ,
            ] ) -> get ();
            //			$invoices = Invoice ::where ( 'patient_name' , $appointment -> firstName . ' ' . $appointment -> lastName ) -> orderby ( 'id' , 'desc' ) -> get ();
            $invoices = Invoice ::where ( 'doctor' , auth () -> user () -> name ) -> get ();
            $invoice_items = [];

            foreach ( $invoices as $invoice ) {
                $invoice_items[] = invoice_items ::where ( 'invoice_id' , $invoice -> id )
                    -> get ();
            }

            return view ( 'pages.invoice-record' , compact ( 'patients' , 'invoices' , 'invoice_items' ) );
        }
    }

    //{{$user->photo ? asset ('storage/' . $user->photo) : asset('/image/1.jpg)}}
