@extends('layouts/layout') @section('viewProfile')
<script src="{!!url('/js/jquery.min.js')!!}"></script>
<h2>View Profile</h2>

<div class="card-deck">
	<div class="card">
		
		<div class="card-body">
			<table>
				<tr>
					<td>User ID: {{$userModel->getId()}}</td>

				</tr>
				<tr>
					<td>First name: {{ $userModel->getFirstName() }} </td>
					<td>Last name: {{ $userModel->getLastName()}}</td>
					
				</tr>
				<tr>
					<td>D.O.B: {{ $userModel->getDob()}}</td>
					<td>Address: {{ $userModel->getAddress()}} </td>
				</tr>
				<tr>
					<td>Phone: {{ $userModel->getPhone()}}</td>
					<td>Email: {{ $userModel->getEmail()}}</td>
		
				</tr>
				<tr>
				<td>Career: {{ $userModel->getCareer()}}</td>
				<td>Skills: {{ $userModel->getSkills()}} </td>
				</tr>
			</table>
		</div>
	</div>
</div>


@endsection
