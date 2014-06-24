{{ Notification::showAll() }}

@if($errors->has())
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		Please review the form below and fix errors before submitting again.
	</div>
@endif