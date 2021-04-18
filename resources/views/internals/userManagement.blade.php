@extends('layouts/layout')

@section('content')
<script src="{!!url('/js/jquery.min.js')!!}"></script>
	<h2>User Management</h2>
	@foreach ($users as $user)
     <div class="card-deck">
        <div class="card">
<!--           <img src="img_avatar.png" alt="Avatar"> -->
            <div class="card-body">
              <h5 class="card-title">Name: {{ $user['firstname']}} {{ $user['lastname']}}</h5>
              <small class="text-muted">  </small>
             <small class="text-muted">   </small>
             <small class="text-muted">   </small>
             <small class="text-muted"></small>
              <table style="width:100%">
                  <tr>
                    <td>Dob: {{ $user['dob']}}</td>
                    <td>Address: {{ $user['address']}}</td>
                     <td> Gender:{{ $user['gender']}}</td>
                  </tr>
                  <tr>
                    <td>Phone: {{ $user['phone']}}</td>
                    <td>Email: {{ $user['email']}}</td>
                    <td>Role: {{ $user['role']}}</td>
                  </tr>
                   <tr>
                    <td>Status: {{ $user['isDeleted'] ? 'Active' : 'Disable'}}</td>
               
                  </tr>
                  <tr>
                    <td><form action="changeStatus" method="POST">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                          	<input hidden=true name="userId" value="{{$user['id']}}"/>
                          	<input type="submit" value="{{ $user['isDeleted'] ? 'Disable' : 'Active'}}"/>
                         </form>
              		</td>
                    <td> <form action="deleteUser" method="post">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                        	 <input hidden=true name="userId" value="{{$user['id']}}"/>
                        	 <input type="submit" value="Delete  "/>
                    	 </form>
        	 		</td>
                  </tr>
               </table>
        	</div>
        </div>
     </div>
        
	@endforeach
	
@endsection