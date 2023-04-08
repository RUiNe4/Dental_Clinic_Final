<?php
	
	use App\Http\Controllers\AdminController;
	use App\Http\Controllers\OurDoctorController;
	use App\Http\Controllers\RequestFormController;
	use App\Http\Controllers\ServiceController;
	use App\Http\Controllers\UserController;
	use App\Models\Appointment;
	use App\Models\User;
	use Illuminate\Support\Facades\Route;
	
	Route ::get ( '/' , function () {
		return view ( 'welcome' );
	} );
	
	Route ::get ( '/service' , ServiceController::class );
	
	Route ::get ( '/community' , function () {
		return view ( 'WIP' );
	} );
	
	Route ::controller ( RequestFormController::class ) -> group ( function () {
		Route ::get ( '/appointment' , RequestFormController::class );
		Route ::post ( '/appointment' , 'store' );
	} );
	
	Route ::controller ( OurDoctorController::class ) -> group ( function () {
		Route ::get ( '/our-doctor' , OurDoctorController::class );
		Route ::get ( '/our-doctor/{user}' , 'show' );
		Route ::post ( '/our-doctor/{user}' , 'store' );
	} );
	
	Route ::controller ( AdminController::class ) -> group ( function () {
		// invoke
		Route ::get ( '/admin' , AdminController::class ) -> name ( 'admin' );
		// admin home
		Route ::get ( '/admin/doctor-list' , 'index' );
		// search
		Route ::get ( '/admin/search' , 'search' );
		// show patient with no appointed doctor
		Route ::get ( '/admin/mailbox' , 'myMail' );
		Route ::delete ( '/admin/delete/{appointment}' , 'destroyAppointment' );
		// show patient related to doctor
		Route ::get ( '/admin/mailbox/{user}' , 'doctorMail' );
		// show doctor info
		Route ::get ( '/admin/doctor-list/{user}' , 'show' );
		// remove doctor account
		Route ::delete ( '/admin/doctor-list/{user}' , 'destroyUser' );
		// change password
		Route ::get ( '/admin/doctor-list/{user}/password' , 'passwordView' );
		Route ::put ( '/admin/doctor-list/{user}/password/set' , 'updatePassword' );
		// decline appointment
		Route ::delete ( '/admin/mailbox/{appointment}' , 'destroyAppointment' );
		//		edit patient
//      update appointment
		Route ::patch ( '/admin/update/{appointment}' , 'update' );
		Route ::get ( '/admin/treatment-list' , 'showTreatmentList' );
		Route ::delete ( '/admin/treatment-list/{treatment}' , 'destroyTreatment' );
		Route ::get ( '/admin/treatment-list/{treatment}' , 'editTreatmentView' );
		Route ::post ( '/admin/treatment-list/{treatment}' , 'updateTreatment' );
		Route ::get ( '/admin/create/treatment-list' , 'createTreatmentView' );
		Route ::post ( '/admin/create/treatment-list' , 'createTreatment' );
		Route ::get ( '/create/invoice/{appointment}' , 'invoiceView' );
		Route ::get ( '/create/invoice/{appointment}/add' , 'addToTempTable' );
		Route ::get ( '/create/invoice/{appointment}/clear' , 'clearFromTable' );
		Route ::post ( '/create/invoice/{appointment}/generate/{doctor}' , 'generateReceipt' );
	} );
	
	Route ::controller ( UserController::class ) -> group ( function () {
		//show register view
		Route ::get ( '/register' , 'register' );
		//create user
		Route ::post ( '/register/user' , 'store' );
		//redirect to register view
		Route ::get ( '/login' , 'login' );
		Route ::post ( '/login/authenticate' , 'authenticate' );
		//logout
		Route ::post ( '/logout' , 'logout' );
		
		Route ::get ( '/doctor' , 'index' );
		//Show patients according to doctor
		Route ::get ( '/doctor/patient-list' , 'myPatients' );
		Route ::get ( '/doctor/patient-list/{sort}' , 'filter' );
		//		Route ::get ( '/doctor/patient-list' , 'filter' );
		Route ::get ( '/doctor/mailbox' , 'myMail' );
		Route ::get ( '/doctor/mailbox/{appointment}' , 'patientInfo' );
		
		Route::get('/doctor/invoice-record', 'invoice_record');
		
		Route ::get ( '/doctor/search' , 'search' );
		
		Route ::get ( '/appointment/{appointment}' , 'patientInfo' );
		Route ::get ( '/appointment/{appointment}/change' , 'change' );
		//		Route ::fallback ( function () {
		//			return view ( 'welcome' );
		//		} );
	} );
