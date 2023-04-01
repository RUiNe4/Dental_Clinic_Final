<?php

namespace App\Http\Controllers;

use App\Models\User;

class OurDoctorController extends RequestFormController
{
    public function __invoke()
    {
        $doctors = User::all();

        return view('pages.our-doctor', compact('doctors'));
    }

    public function show(User $user)
    {
        return view('pages.doctor-info', compact('user'));
    }
}
