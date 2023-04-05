<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __invoke(){
			$services = Service::all ();
			$i = 1;
			return view('pages.service', compact('services', 'i'));
		}
}
