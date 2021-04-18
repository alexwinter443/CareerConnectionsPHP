@extends('layouts/layout') @section('content')
<h1>Send Email</h1>
<div>
	<form action="sendEmail" method="post">
		<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
		<div class="form-group">
			<label for="email">Email address: </label> <input
				type="email" class="form-control mx-sm-3"
				id="toEmail" name="toEmail" placeholder="Enter other user's email">
		</div>
		<div class="form-group">
			<label for="subject">Subject: </label> <input
				type="text" class="form-control mx-sm-3"
				id="subject" name="subject" placeholder="Subject">
		</div>
		<div class="form-group">
			<label for="textArea">Message</label>
			<textarea class="form-control" id="message" name="message"
				rows="3"></textarea>
		</div>

		<button class="btn btn-lg btn-success" type="submit">
		<i class="glyphicon glyphicon-ok-sign"></i>
			Send Email
		</button>
	</form>


</div>
@endsection
