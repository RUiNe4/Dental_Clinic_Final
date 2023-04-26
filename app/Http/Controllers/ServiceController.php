<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Treatment;

class ServiceController extends Controller
{
    public function __invoke()
    {
        $services = Service::all();
        $treatments = Treatment::all ();
        $i = 1;

        return view('pages.service', compact('services', 'i'));
    }
}
