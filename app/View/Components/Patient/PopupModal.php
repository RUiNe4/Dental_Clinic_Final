<?php

namespace App\View\Components\Patient;

    use Illuminate\View\Component;

    class PopupModal extends Component
    {
        /**
         * Create a new component instance.
         *
         * @return void
         */
        public $patient;

        public function __construct($patient)
        {
            $this->patient = $patient;
        }

        /**
         * Get the view / contents that represent the component.
         *
         * @return \Illuminate\Contracts\View\View|\Closure|string
         */
        public function render()
        {
            return view('components.patient.popup-modal');
        }
    }
