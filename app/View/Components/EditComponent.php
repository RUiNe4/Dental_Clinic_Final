<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditComponent extends Component
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
        return view('components.edit-component');
    }
}
