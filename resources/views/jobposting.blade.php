<!-- Anh le-->
<!-- professor Hughes-->
<!-- Date: 3/14/2021-->
<!-- Milestone 2-->
<!-- this is my own work-->
@extends('layouts/layout') @section('jobPosting')
<script src="{!!url('/js/jquery.min.js')!!}"></script>
<h2>Job Posting</h2>

<div class="tab-content">

	<div class="tab-pane active" id="home">

		<form class="form" action="createJobPosting" method="POST"
			id="jobPostingForm">
			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">

			<div class="form-group">

				<div class="col-xs-6">
					<label for="title">Job Title</label> <input type="text"
						class="form-control" name="title" id="title"
						placeholder="Job title" title="enter your job title.">
				</div>
			</div>
			<div class="form-group">

				<div class="col-xs-6">
					<label for="description">Job Description</label> <input type="text"
						class="form-control" name="description" id="description"
						placeholder="Job description" title="enter your job description.">
				</div>
			</div>



			<div class="form-group">
				<div class="col-xs-12">
					<br>
					<button class="btn btn-lg btn-success" type="submit">
						<i class="glyphicon glyphicon-ok-sign"></i> Save
					</button>
					<button class="btn btn-lg" type="reset">
						<i class="glyphicon glyphicon-repeat"></i> Reset
					</button>
				</div>
			</div>

		</form>
	</div>
</div>



@endsection
