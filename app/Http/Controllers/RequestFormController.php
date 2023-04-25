<?php

namespace App\Http\Controllers;

    use App\Models\Appointment;
    use App\Models\User;

    class RequestFormController extends MailController
    {
        public function __invoke()
        {
            $success = false;
            $user = User::all()->first();

            return view('pages.appointment', compact('user', 'success'));
        }

        public function store(User $user)
        {
            if ($user->name != null) {
                $user->patient_count++;
                $user->update();
            }
            Appointment::create([
                'appointedDoctor' => $user->name,
                'firstName' => \request('fName'),
                'lastName' => \request('lName'),
                'phoneNum' => \request('phoneNum'),
                'email' => \request('email'),
                'birthday' => \request('birthday'),
                'appointmentDate' => \request('apntDate'),
                'message' => \request('message'),
            ]);

            //			dd(request ('email'));

            $this->mail(request('email'),
                'Thank you very much '.\request('fName').' '.\request('lName').' for booking an Appointment with us.
We will try to get through to you once we get words from our Dentists in 1-2 business days.');

            return back()->withErrors (['message' => 'Appointment Booked Successfully']);
        }
    }
