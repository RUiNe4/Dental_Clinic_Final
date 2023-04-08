<?php
	
	namespace App\View\Components;
	
	use Illuminate\View\Component;
	
	class FilterForm extends Component
	{
		/**
		 * Create a new component instance.
		 *
		 * @return void
		 */
		public $sort;
		
		public function __construct ( $sort )
		{
			$this -> sort = $sort;
		}
		
		/**
		 * Get the view / contents that represent the component.
		 *
		 * @return \Illuminate\Contracts\View\View|\Closure|string
		 */
		public function render ()
		{
			return view ( 'components.filter-form' );
		}
	}
