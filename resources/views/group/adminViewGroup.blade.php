@extends('layouts/layout')

@section('content')
		<h4>Groups</h4>
        <table class="table">
          <thead>
            <tr>
              <th scope="col" hidden="true"> {{$count = 1}}</th>
               <th scope="col">No</th>
              <th scope="col">Group</th>
              <th scope="col">Descrition</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
         
        	@foreach ($groups as $group)
            <tr>
              <th scope="row" hidden="true">{{ $group['ID']}}</th>
               <th scope="col">{{$count++}}</th>
              <td>{{ $group['GroupName']}}</td>
              <td>{{ $group['Description']}}</td>
              <td>{{ $group['isActive'] ? 'Active' : 'Inactive'}}</td>
              <td>
              	<form action="changeStatusGroup" method="POST">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                          	<input hidden=true name="groupID" value="{{$group['ID']}}"/>
                          	<input type="submit" value="{{ $group['isActive'] ? 'Deactive' : 'Active'}}"/>
                         </form>
              		</td>
                    <td> <form action="deleteGroup" method="post">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                        	 <input hidden=true name="groupID" value="{{$group['ID']}}"/>
                        	 <input type="submit" value="Delete  "/>
                </form>
        	 </td>
            </tr>
			@endforeach
			
		</tbody>
        </table>
        <form action="createGroup" method="POST">
        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
			<button class="btn btn-lg btn-success" type="submit">
				<i class="glyphicon glyphicon-ok-sign"></i> Create Group
			</button>
		
		</form>
@endsection