<?php

namespace App\View\Components\Patient;

use Illuminate\View\Component;

class PatientItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $patient;

    public $doctors;

    public function __construct($patient, $doctors)
    {
        $this->patient = $patient;
        $this->doctors = $doctors;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.patient.patient-item');
    }
}
