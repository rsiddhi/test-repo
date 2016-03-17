@extends('template/base')

@section('content')
<form class="form-horizontal" action="/members/create" role="form" method="post">
    {{ csrf_field() }}
	<div class="form-group">
    	<label for="name" class="col-sm-2 control-label" >Name</label>
    	<div class="col-sm-4">
      	<input type="text" class="form-control" id="name" name="name" >
    	</div>
		<span style="color:red" id="error_name"></span>
  	</div>
	<div class="form-group">
	    <label for="gender" class="col-sm-2 control-label">Gender</label>
	    <div class="col-sm-4">
	      <div class="radio">
			  <label><input type="radio" name="gender" value="Male">Male</label>
			</div>
			<div class="radio">
			  <label><input type="radio" name="gender" value="Female">Female</label>
			</div>

	    </div>
	</div>

	<div class="form-group">
	    <label for="phone" class="col-sm-2 control-label">Phone</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="phone" name="phone" >
	    </div>
	    <span style="color:red" id="error_phone"></span>
	</div>
	
  	<div class="form-group">
	    <label for="email" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="email" name="email" >
	    </div>
	    <span style="color:red" id="error_email"></span>
	</div>	

	<div class="form-group">
	    <label for="address" class="col-sm-2 control-label">Address</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="address" name="address" >
	    </div>
	    <span style="color:red" id="error_address"></span>
	</div>
	<div class="form-group">
	    <label for="nationality" class="col-sm-2 control-label">Nationality</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="nationality" name="nationality" >
	    </div>
	</div> 
	<div class="form-group">
	    <label for="dob" class="col-sm-2 control-label">Date of birth</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="datepicker" name="dob" >
	    </div>
	    <span style="color:red" id="error_datepicker"></span>
	</div>
	<div class="form-group">
	    <label for="education_background" class="col-sm-2 control-label">Education Background</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="education_background" name="education_background">
	    </div>
	</div>
	<div class="form-group">
	    <label for="mode_of_contact" class="col-sm-2 control-label">Mode of Contact </label>
	    <div class="col-sm-2">
	      <select class="form-control" id="mode_of_contact" name="mode_of_contact">
	      	<option value="phone">phone</option>
	      	<option value="email">email</option>
	      	<option value="none">none</option>
	      </select>
	    </div>
	</div>       	
  	<div class="form-group">
    	<div class="col-sm-offset-2 col-sm-10">
      		<button type="submit" class="btn btn-success col-sm-2">Save</button>
    	</div>
  	</div>
</form>

</div>

<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });

  
  </script>

  <script type="text/javascript" src="{{asset('/bower_components/Custom/form_validate.js')}}"></script>

@stop