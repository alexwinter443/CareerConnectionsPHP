<!-- Alex Vergara -->
<!-- Date: 3/14 -->
<!-- Professor Hughes -->
<!-- this is my own work -->
@extends('layouts/layout') 
@section('jobPosting')
<script src="{!!url('/js/jquery.min.js')!!}"></script>
<h2>Details</h2>
<div class="card-deck">
	<div class="card">
		<div class="card-body">
			<table style="width: 100%">
				<!-- Job ID -->
				<tr>
					<td>Job ID: {{ $jobModel->getJobID() }}</td>

				</tr>
				<!-- Title -->
				<tr>
					<td>Job Title: {{ $jobModel->getTitle() }}</td>

				</tr>
				<!-- Job Description -->
				<tr>
					<td>Job Description: {{ $jobModel->getDescription() }} </td>
				</tr>
				<!-- Wage  -->
				<tr>
					<td>Job Wage: ${{ $jobModel->getWage() }} </td>
				</tr>
				
				<tr>
					<td>Location: {{ $jobModel->getLocation() }} </td>
				</tr>
				
				<tr>
					<td>Requirements: {{ $jobModel->getRequirements() }} </td>
				</tr>
				
				<tr>
					<td>Job Type: {{ $jobModel->getJobType() }} </td>
				</tr>

			</table>
		</div>
	</div>
</div>

@endsection