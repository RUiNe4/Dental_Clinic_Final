<div style="background-color: white" class="px-3 py-2 rounded-lg parent-card flex justify-between items-center mb-3">
	<x-patient.patient-item :patient="$patient" :doctors="$doctors"/>
	@if(request ()->path ()!='doctor/mailbox')
		<x-patient.popup-modal :patient="$patient"/>
	@endif
	<x-edit-component :patient="$patient" :doctors="$doctors"/>
</div>
