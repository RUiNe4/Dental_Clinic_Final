<?php

namespace App\View\Components\Doctor;

use Illuminate\View\Component;

class DoctorItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $doctor;

    public function __construct($doctor)
    {
        $this->doctor = $doctor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.doctor.doctor-item');
    }
}
