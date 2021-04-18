@extends('layouts/layout') @section('jobHistory')
<script src="{!!url('/js/jquery.min.js')!!}"></script>
<h2>Job History</h2>


@foreach ($JobHistoryModels as $JobHistoryModel)
<div class="card-deck">
	<div class="card">
		<!--           <img src="img_avatar.png" alt="Avatar"> -->
		<div class="card-body">
			<h5 class="card-title">Job title: {{ $JobHistoryModel['title']}}</h5>
			<small class="text-muted"> </small> <small class="text-muted"> </small>
			<small class="text-muted"> </small> <small class="text-muted"></small>
			<table style="width: 100%">
				<tr>
					<td>Position: {{ $JobHistoryModel['position']}}</td>
					<td>Began: {{ $JobHistoryModel['dateStart']}}</td>
					<td>Ended:{{ $JobHistoryModel['dateEnd']}}</td>
				</tr>
				<tr>
					<td>Skill: {{ $JobHistoryModel['skills']}}</td>
					<td>School: {{ $JobHistoryModel['schools']}}</td>
					<td>Highest Degree: {{ $JobHistoryModel['highestDegree']}}</td>
				</tr>
				<tr>
					<td>UserID: {{ $JobHistoryModel['userID']}}</td>
				</tr>
				<tr>
					<td><form action="changeStatus" method="POST">
							<input type="hidden" name="_token"
								value="<?php echo csrf_token() ?>"> <input hidden=true
								name="jobID" value="{{$JobHistoryModel['jobID']}}" /> <input type="submit"
								value="{{$JobHistoryModel['isDeleted'] ? 'Disable' : 'Active'}}" />
						</form></td>
					<td>
						<form action="deleteHistory" method="post">
							<input type="hidden" name="_token"
								value="<?php echo csrf_token() ?>"> <input hidden=true
								name="jobID" value="{{$JobHistoryModel['jobID']}}" /> <input type="submit"
								value="Delete" />
						</form>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>

@endforeach @endsection
