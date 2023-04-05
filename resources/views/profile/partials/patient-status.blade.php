<div style="background-color: white" class="px-3 shadow-md py-2 rounded-lg parent-card flex justify-between items-center mb-3">
	
	@if($patient->status == "Approve")
		<x-patient.popup-modal :patient="$patient"/>
	@else
		<x-patient.patient-item :patient="$patient" :doctors="$doctors"/>
	@endif
	
	<div class="{{ $patient->status == "Approve" ? "hidden" : "" }}">
		<x-edit-component :patient="$patient" :doctors="$doctors"/>
	</div>
</div>
