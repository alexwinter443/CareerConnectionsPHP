@extends('layouts/layout') @section('content')
<h4>Joined Group</h4>
<table class="table">
	<thead>
		<tr>
			<th scope="col" hidden="true">{{$count = 1}}</th>
			<th scope="col">No</th>
			<th scope="col">Group</th>
			<th scope="col">Descrition</th>
		</tr>
	</thead>
	<tbody>

		@foreach ($groups as $group)
		<tr>
			<th scope="row" hidden="true">{{ $group['ID']}}</th>
			<th scope="col">{{$count++}}</th>
			<td>{{ $group['GroupName']}}</td>
			<td>{{ $group['Description']}}</td>
			<td>
				<form action="leaveGroup" method="POST">
					<input type="hidden" name="_token"
						value="<?php echo csrf_token() ?>"> <input hidden=true
						name="groupID" value="{{$group['ID']}}" /> <input type="submit"
						value="Leave" />
				</form>
			</td>

		</tr>
		@endforeach
	</tbody>
</table>


<h4>Group List</h4>
<table class="table">
	<thead>
		<tr>
			<th scope="col" hidden="true">{{$count = 1}}</th>
			<th scope="col">No</th>
			<th scope="col">Group</th>
			<th scope="col">Descrition</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($availableGroups as $availableGroup)
		<tr>
			<th scope="row" hidden="true">{{ $availableGroup['ID']}}</th>
			<th scope="col">{{$count++}}</th>
			<td>{{ $availableGroup['GroupName']}}</td>
			<td>{{ $availableGroup['Description']}}</td>
			<td>
				<form action="joinGroup" method="POST">
					<input type="hidden" name="_token"
						value="<?php echo csrf_token() ?>"> <input hidden=true
						name="groupID" value="{{$availableGroup['ID']}}" /> <input
						type="submit" value="Join" />
				</form>
			</td>

		</tr>
		@endforeach @endsection