@extends('layouts/layout')

@section('content')

	<h3>Group</h3>
	<div>
		<form action="addGroup" method="post">
			{{csrf_field()}}
			<!-- Table Div -->
			<div class="group-table">
				<div class="form-head">Add Group</div>
				<div class="form-column">
					<div>
						<label for="group">Group Name</label><span id="user-info"
							class="error-info"></span>
					</div>
					<div>
						<input name="group" id="group" type="text"
							class="demo_input_box">
					</div>
				</div>
					<div class="form-column">
					<div>
						<label for="description">Description</label><span id="user-info"
							class="error-info"></span>
					</div>
					<div>
						<input name="description" id="description" type="text"
							class="demo_input_box">
					</div>
				</div>
				<div>
					<input type="submit" class="btnLogin" value="Create"/>
				</div>
			</div>
			<!-- End Table Div -->
		</form>
	</div>
	
@endsection