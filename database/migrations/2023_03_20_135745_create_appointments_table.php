<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	return new class extends Migration {
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up ()
		{
			Schema ::create ( 'appointments' , function ( Blueprint $table ) {
				$table -> id ();
				$table -> string ( 'firstName' );
				$table -> string ( 'lastName' );
				$table -> string ( 'phoneNum' );
				$table -> string ( 'email' );
				$table -> string ( 'appointedDoctor' ) -> nullable ();
				$table -> string ( 'status' ) -> default ( 'PENDING' );
				$table -> date ( 'birthday' ) -> nullable ();
				$table -> date ( 'appointmentDate' ) -> nullable ();
				$table -> text ( 'message' ) -> nullable ();
				$table -> integer ( 'invoice_id' ) -> nullable ();
				$table -> boolean ( 'paid' ) -> default ( false );
				$table -> timestamps ();
			} );
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down ()
		{
			Schema ::dropIfExists ( 'appointments' );
		}
	};
