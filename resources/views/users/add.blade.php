@extends('layouts.app')
@section('content')
			<!-- Main container start -->
				<div class="main-container">
				
				
					<div class="page-header text-center">
						
						<!-- Breadcrumb start -->
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
							<?php 
								if(empty($id))
								{
									echo "Add ";
								}
								else
								{
									echo "Edit ";
								}
							?>
							User
							</li>
						</ol>
						

					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<form method="post" action ="{{route('user.store')}}" id="myform" autocomplete="off">
                        @csrf
						<div class="row gutters">
							<div class="col-md-12">
								<div class="form-group">
									
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="first_name">First Name</label>
									<input type="text" class="form-control" value="" id="first_name" name="first_name" placeholder="First Name">
									
								</div>
							</div>
							
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="last_name">Last Name</label>
									<input type="text" class="form-control" value="" id="last_name" name="last_name" placeholder="Last Name">
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="emailid">Email</label>
									<input type="text" class="form-control"  value="" id="emailid" name="emailid" placeholder="Email">
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="contactno">Contact No</label>
									<input type="text" class="form-control"   value="" id="contactno" name="contactno" placeholder="Contact No">
								</div>
							</div>
							
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="warehouse_id">Warehouse</label>
									<select class="form-control" id="warehouse_id" name="warehouse_id" >
									<option value="">Please Select</option>
                                    @foreach ($warehouse as $ware )
                                      <option value="{{$ware->id}}">{{$ware->warehouse}}</option>  
                                    @endforeach

									</select>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="usertype">Usertype</label>
									<select class="form-control" id="usertype" name="usertype" >
										<option value="">Please Select</option>
										<option  value="Admin">Admin</option>
										<option  value="Manager">Manager</option>
										<option  value="Employee">Employee</option>
										<option  value="Client">Client</option>									
										<option  value="Logistics">Relocations Manager</option>									
										<option  value="Dispatcher">Dispatcher</option>									
									</select>
								</div>
							</div>
							
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control"  value="" id="password" name="password" placeholder="Password">
								</div>
							</div>
							
							
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="confirm_password">Confirm Password</label>
									<input type="password"  value="" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
								</div>
							</div>
							
							
							<div class="col-md-1">
								<br>
								<div class="custom-control custom-checkbox my-1 mr-sm-2">
									<input type="checkbox" class="custom-control-input" id="customControlInline" 
									 name="isdeleted">
									<label class="custom-control-label" for="customControlInline">Disable</label>
								</div>
							</div>
							
							
							<div class="col-md-2">
								<div class="form-group">
								<br>
									<button type="submit" name="sub" class="btn btn-primary my-1">Submit</button>
									<a href="{{route('user')}}" class="btn btn-primary my-1">Back</a>
								</div>
							</div>
							</div>
							
						</form>
					</div>
				</div>
			<!-- Main container end -->

    

<script>

$('#contactno').inputmask('(999) 999-9999');  
$( "#myform" ).submit(function( event ) {
	var sTest = $("#contactno").val();
	 var iCount = 0;
	for (iIndex in sTest) {
		if (!isNaN(parseInt(sTest[iIndex]))) {
			iCount++;
		}
	}
	if(iCount == 10)
	{
	}
	else
	{
		swal("error","Contact no should be of 10 character","error");
		event.preventDefault();
	}
});

	$.validator.addMethod("pwcheck", function(value) {
   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       && /[a-z]/.test(value) // has a lowercase letter
       && /\d/.test(value) // has a digit
});
	$( "#myform" ).validate({
	  rules: {
		first_name: {
		  required: true
		},
		last_name: {
		  required: true
		},
		usertype: {
		  required: true
		},
		emailid: {
		  required: true,
		  email: true
		},
		contactno: {
		  required:true,
		},
		password : {
			required:true,
			pwcheck: true,
			minlength : 8
		},
		confirm_password : {
			required:true,
			minlength : 8,
			equalTo : "#password"
		}
	  },
	  messages: {
			password: {
				pwcheck: "Password should contain minimum 8 characters, 1 uppercase, 1 smallcase and 1 numeric and 1 special character"
			},
	  }
	});
</script>
  @include('layouts.footer')
@endsection
				