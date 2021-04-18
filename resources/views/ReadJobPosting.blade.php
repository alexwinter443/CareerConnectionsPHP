<!-- Vien -->
<!-- Date: 3/14 -->
<!-- Professor hughes -->
<!-- this is my own work -->
@extends('layouts/layout') @section('jobRead')
<!-- Script -->
<script src="{!!url('/js/jquery.min.js')!!}"></script>
<h2>Job Listings</h2>
<!-- foreach jobpostingmodel in the array -->
@foreach ($JobPostingModels as $JobPostingModel)
<div class="card-deck">
	<div class="card">
		<div class="card-body">
			<!-- Get job title -->
			<h5 class="card-title">Job title: {{ $JobPostingModel['title']}}</h5>
			<small class="text-muted"> </small> <small class="text-muted"> </small>
			<small class="text-muted"> </small> <small class="text-muted"></small>
			<table style="width: 100%">
			    <!-- Get Description -->
				<tr>
					<td>Job description: {{ $JobPostingModel['description']}}</td>

				</tr>
				<!-- this button navigates to our job details page -->
				<tr>
					<td>
						<form action="viewJob" method="post">
							<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
							<!-- passes job id -->
						    <input hidden=true name="jobID" value="{{$JobPostingModel['ID']}}" />
						    <!-- submit form -->	
							<input type="submit" value="Details" />
						</form>
						<form action="deletePost" method="post">
							<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
							<!-- passes job id -->
						    <input hidden=true name="jobID" value="{{$JobPostingModel['ID']}}" />
						    <!-- submit form -->	
							<input type="submit" value="Delete" />
						</form>
					</td>
				</tr>

			</table>
		</div>
	</div>
</div>

@endforeach @endsection
