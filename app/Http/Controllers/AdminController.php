<?php

namespace App\Http\Controllers;

    use App\Models\Appointment;
    use App\Models\Invoice;
    use App\Models\invoice_items;
    use App\Models\Temp;
    use App\Models\Treatment;
    use App\Models\User;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Validation\Rule;

    class AdminController extends MailController
    {
        public function clearFromTable()
        {
            DB::table('temps')->truncate();

            return redirect()->back();
        }

        public function invoiceView(Request $request, Appointment $appointment)
        {
            //			dd($appointment);
            $treatments = Treatment::all();
            $items = Temp::all();
            $myTime = Carbon::now();
            $countMail = Appointment::where('appointedDoctor', null)->count();
            $amount = Temp::all()->sum(function ($t) {
                return $t->price * $t->qty;
            });
            //			$format = date ( 'Y-m-d' );
            //			$myTime = Carbon ::createFromFormat ( 'Y-m-d' , $format )
            //				-> format ( 'Y-m-d' );
            $patients = Appointment::where('appointedDoctor', Auth::user()->name)->get();

            return view('pages.create-invoice', [
                //				'patients' => $patients ,
                'appointment' => $appointment,
                'treatments' => $treatments,
                'items' => $items,
                'total' => $amount,
                'date' => $myTime,
                'countMail' => $countMail,
            ]);
        }

        public function generateReceipt(Request $request, Appointment $appointment, $doctor)
        {
            $amount = $request->get('total');
            // dd();
            //			$patient = Appointment ::find ( $request -> get ( 'patient_name' ) );
            //			dd($request -> get ( 'patient_name' ));
            if ($amount > 0) {
                DB::table('invoices')->insert([
                    'patient_id' => $appointment->id,
                    'patient_name' => $appointment->firstName.' '.$appointment->lastName,
                    'date' => $request->get('curdate'),
                    'doctor' => $doctor,
                    'amount' => $amount,
                ]);

                $appointment->paid = 1;
                $appointment->update();

                $invoice_id = DB::table('invoices')->orderBy('id', 'desc')->first()->id;

                $invoice_items = invoice_items::where('invoice_id', null)->get();
                foreach ($invoice_items as $invoice_item) {
                    $invoice_item->invoice_id = $invoice_id;
                    $invoice_item->update();
                }

                //			if($invoice_items){
                //				$invoice_items->invoice_id = $invoice_id;
                //			}

                //			dd($invoice_items);

                self::clearFromTable();
            }

            return redirect('doctor/patient-list');
        }

        public function addToTempTable(Request $request, Treatment $treatment)
        {
            $treatments = Treatment::all();
            $qty = $request->get('qty');
            foreach ($treatments as $treatment) {
                if ($treatment['id'] == $request->get('treatment')) {
                    DB::table('temps')->insert([
                        'treatment_name' => $treatment['treatment_name'],
                        'price' => $treatment['price'],
                        'qty' => $qty,
                        'amount' => $qty * $treatment['price'],
                    ]);
                    self::invoice_items($request, $treatment);
                }
            }

            return redirect()->back();
        }

        public function invoice_items(Request $request, $treatment)
        {
            DB::table('invoice_items')->insert([
                'treatment_id' => $treatment['id'],
                'treatment_name' => $treatment['treatment_name'],
                'qty' => $request->get('qty'),
                'price' => $treatment['price'],
                'amount' => $request->get('qty') * $treatment['price'],
            ]);

            return redirect()->back();
        }

        public function showTreatmentList(Treatment $treatments)
        {
            $treatments = Treatment::all();
            $doctors = User::all();
            $countMail = Appointment::where('appointedDoctor', null)->count();

            return view('pages.treatment-list', [
                'treatments' => $treatments,
                'doctors' => $doctors,
                'countMail' => $countMail,
            ]);
        }

        public function createTreatmentView()
        {
            $doctors = User::all();
            $countMail = Appointment::where('appointedDoctor', null)->count();

            return view('pages.add-new-treatment', [
                'doctors' => $doctors,
                'countMail' => $countMail,
            ]);
        }

        public function createTreatment(Request $request)
        {
            $formfield = $request->validate([
                'treatment_name' => ['required', 'string', Rule::unique('treatments', 'treatment_name')],
                'price' => 'required',
            ]);
            $treatment = Treatment::create($formfield);

            return redirect('/admin/treatment-list')->with('message', 'Treatment created Successfully');
        }

        public function update(Request $request, Appointment $appointment)
        {
            $user = User::find($appointment->id);
            if ($user != null) {
                $user->patient_count--;
                $user->update();
            }
            if ($appointment->appointedDoctor == null) {
                $appointment->appointedDoctor = $request['doctorValue'];
            }
            $appointment->status = 'Approve';
            $appointment->update();

            // Message Body// Message Body
            $this->mail($appointment->email, 'Greetings '.$appointment->firstName.' '.$appointment->lastName.',

We have confirmed your request for an appointment with Dr. '.$appointment->appointedDoctor.'. Your scheduled time with Dr. ChhayS. is at '.$appointment->appointmentDate.'.

Please contact us at our phone number : 023 830 830 or reach out to us on facebook for more information.

We appreciate your timely attendance for this appointment!

Thank you for booking your appointment with SmilelineClinic!
');

            return redirect()->back();
        }

        public function destroyTreatment(Treatment $treatment)
        {
            $treatment->delete();

            return redirect()->back();
        }

        public function editTreatmentView(Treatment $treatment)
        {
            $doctors = User::all();

            return view('pages.edit-treatment', [
                'treatment' => $treatment,
                'doctors' => $doctors,
            ]);
        }

        public function destroyAppointment(Appointment $appointment)
        {
            // Message Body
            $this->mail($appointment->email, 'Greetings ,'.$appointment->firstName.' '.$appointment->lastName.'

Unfortunately your appointed doctor is not available on the time you have requested for an appointment , therefore your appointment has been declined.

Please let us know if you would like to rebook the appointment by go to our website or contact the number below
098 233 324.

Thank you for booking your appointment with SmilelineClinic!
');
            if (auth()->user()->acc_type != 'admin') {
                $appointment->delete();

                return redirect('/doctor/mailbox');
            } else {
                $appointment->delete();

                return redirect()->back();
            }
        }

        public function destroyUser(User $user)
        {
            $user->delete();

            return redirect()->back();
        }

        public function passwordView(User $user)
        {
            return view('pages.change-password', ['user' => $user]);
        }

        public function passwordCorrect($suppliedPassword, $oldPassword)
        {
            return Hash::check($suppliedPassword, $oldPassword, []);
        }

        public function updatePassword(Request $request, User $user)
        {
            //Hash Password
            if (self::passwordCorrect($request['oldPassword'], $user->password)) {
                $user->update(['password' => bcrypt($request['password'])]);

                return redirect('/admin/doctor-list/'.$user->id);
            } else {
                return redirect('/admin/doctor-list/'.$user->id.'/password');
            }
        }

        public function __invoke()
        {
            if (Auth::check()) {
                if (auth()->user()->acc_type == 'admin') {
                    $doctors = User::latest()->paginate(6);
                    $countMail = Appointment::where('appointedDoctor', null)->count();

                    return view('layouts.admin', compact('doctors', 'countMail'));
                } else {
                    auth::logout();

                    return view('pages.login');
                }
            } else {
                auth::logout();

                return view('pages.login');
            }
        }

        public function index()
        {
            $countMail = Appointment::where('appointedDoctor', null)->count();
            $doctors = User::where('acc_type', 'Doctor')->paginate(6);

            return view('pages.doctor-list', compact('doctors', 'countMail'));
        }

        public function filter()
        {
            $doctors = User::latest()->paginate(6);
            $sort = \request('sort', 'asc');
            $filter = request()['filter'];
            switch ($filter) {
                case 'paid':
                    $patients = Appointment::where([
                        'appointedDoctor' => auth()->user()->name,
                        'status' => 'Approve',
                        'paid' => 1,
                    ])
                        ->orderby('paid', $sort)
                        ->paginate(6);
                    break;
                case 'unpaid':
                    $patients = Appointment::where([
                        'appointedDoctor' => auth()->user()->name,
                        'status' => 'Approve',
                        'paid' => 0,
                    ])
                        ->orderby('paid', $sort)
                        ->paginate(6);
                    break;
                default:
                    if ($filter == null) {
                        return redirect('/doctor/patient-list')->with('status', 'HI');
                    }
                    $patients = Appointment::where([
                        'appointedDoctor' => auth()->user()->name,
                        'status' => 'Approve',
                    ])
                        ->orderby($filter, $sort)
                        ->paginate(6);
                    break;
            }

            return view('pages.patient-list', compact('sort', 'doctors', 'patients'));
        }

        public function doctorMail($doctor)
        {
            $sort = \request('sort', 'asc');
            $doctors = User::all();
            $patients = Appointment::where([
                'appointedDoctor' => $doctor,
                'status' => 'PENDING',
            ])
                ->paginate(6);
            $doctorMail = count($patients);
            //			$countMail = Appointment ::where ( 'appointedDoctor' , NULL ) -> count ();
            $countMail = Appointment::where([
                'appointedDoctor' => null,
                'status' => 'PENDING',
            ])->count();

            return view('pages.patient-list', compact('sort', 'doctorMail', 'countMail', 'patients', 'doctors'));
        }

        public function myMail()
        {
            $sort = \request('sort', 'asc');
            $doctors = User::where('acc_type', 'Doctor')->get();
            if (auth()->user()->acc_type == 'Doctor') {
                $patients = Appointment::where('appointedDoctor', auth()->user()->name)
                    ->where('status', 'PENDING')
                    ->paginate(6);
                $countMail = count($patients);
            } else { // for Acc_type = Admin
                $patients = Appointment::where(
                    'appointedDoctor', null
                )->paginate(6);
                $countMail = count($patients);
            }

            return view('pages.patient-list', compact('sort', 'countMail', 'patients', 'doctors'));
        }

        public function show(User $user)
        {
            $countMail = Appointment::where('appointedDoctor', null)->count();
            $doctors = User::all();
            $invoices = Invoice::where('doctor', $user->name)->get();
            //			dd($user);
            return view('pages.edit-doctor', compact('countMail', 'user', 'doctors', 'invoices'));
        }

        public function search()
        {
            $sort = \request('sort', 'asc');
            $countMail = Appointment::where('appointedDoctor', null)->count();
            $doctors = User::all();
            $search = request()->query('appointment');
            if ($search == '') {
                return redirect()->back();
            }
            if ($search) {
                $patients = Appointment::where(DB::raw('CONCAT_WS(" ", firstName, lastName)'), 'like', "%{$search}%")
                    ->orwhere('id', 'like', "%{$search}%")
                    ->paginate(6);
            } else {
                $patients = Appointment::where('appointedDoctor', auth()->user()->name)->paginate(6);
            }

            return view('pages.patient-list', compact('sort', 'countMail', 'patients', 'doctors'));
        }

        public function updateDoctor(User $user, Request $request)
        {
            $invoices = Invoice::where('doctor', $user->name)->get();
            foreach ($invoices as $invoice) {
                $invoice->doctor = $request['name'];
                $invoice->update();
            }
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->specialist = $request['specialist'];
            $user->description = $request['description'];
            $user->work_experience = $request['work_experience'];
            $user->acc_type = $request['acc_type'];
            $user->update();

            return redirect()->back();
        }
    }
