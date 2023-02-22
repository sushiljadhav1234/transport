@extends('layouts.app')
@section('content')
   @if (Auth::user()->user_type == 'Admin' ||
            Auth::user()->user_type == 'Manager' ||
            Auth::user()->user_type == 'Employee' ||
            Auth::user()->user_type == 'Client')

				<!-- Main container start -->
				<div class="main-container">
				
				
					<div class="page-header text-center">
						
						<!-- Breadcrumb start -->
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
							Add/Edit Warehouse
							</li>
						</ol>
						

					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<form method="post" id="myform">
						<div class="row gutters">
							<div class="col-md-12">
								<div class="form-group">
									<?php echo $errormsg; ?>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="warehouse">Warehouse</label>
									<input type="text" class="form-control" value="<?php echo $warehouse; ?>" id="warehouse" name="warehouse" placeholder="Warehouse">
									<input type="hidden" class="form-control" value="<?php echo $id; ?>" id="id" name="id">
								</div>
							</div>
							
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="address_street">Street</label>
									<input type="text" class="form-control" value="<?php echo $address_street; ?>" id="address_street" name="address_street" placeholder="Street">
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label for="address_city">City</label>
									<input type="text" class="form-control"  value="<?php echo $address_city; ?>" id="address_city" name="address_city" placeholder="City">
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label for="address_state">State</label>
									<input type="text" class="form-control"   value="<?php echo $address_state; ?>" id="address_state" name="address_state" placeholder="State">
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label for="address_zip">Zip</label>
									<input type="text" class="form-control"   value="<?php echo $address_zip; ?>" id="address_zip" name="address_zip" placeholder="Zip">
								</div>
							</div>
							
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="warehouse_type">Type</label>
									<select class="form-control" id="warehouse_type" name="warehouse_type" >
										<option value="">Please Select</option>
										<option <?php if($warehouse_type == 'Vine Vault'){ echo " selected "; } ?> value="Vine Vault">Vine Vault</option>
										<option <?php if($warehouse_type == 'Cross-Docking'){ echo " selected "; } ?> value="Cross-Docking">Cross-Docking</option>
										<option <?php if($warehouse_type == 'Storage Facility'){ echo " selected "; } ?> value="Storage Facility">Storage Facility</option>
										<option <?php if($warehouse_type == 'Subcontractor'){ echo " selected "; } ?> value="Subcontractor">Subcontractor</option>									
									</select>
								</div>
							</div>
							
							
							
							
								<div class="col-md-3">
								<div class="form-group">
								<br>
									<button type="submit" name="sub" class="btn btn-primary my-1">Submit</button>
									<button type="button" onclick="window.history.back();" class="btn btn-primary my-1">Back</button>
								</div>
							</div>
						</form>
							</div>
							
							
							<div class="row" id="contactdetailssection">
							
							<div class="col-md-12">
								<div class="table-container">
									<div class="t-header">Contact Person Details</div>
									<div class="table-responsive">
										<table id="mytable" class="table custom-table">
											<thead>
												<tr style="background-color: #1A233A;">
												<form method="post" id="contactform">
													<th><input type="text" class="form-control"  id="contact_person_name" name="contact_person_name" placeholder="Contact Person Name"  required><input type="hidden" class="form-control" value="<?php echo $id; ?>" id="warehouse_id" name="warehouse_id"><input type="hidden" class="form-control" value="0" id="row_id" name="row_id"></th>
													<th><input type="text" class="form-control"   id="contact_person_phone" name="contact_person_phone" placeholder="Contact Person No." required></th>
													<th><input type="email" class="form-control"   id="contact_person_email" name="contact_person_email" placeholder="Contact Person Email"  required></th>
													<th><select class="form-control"   id="contact_person_usertype" name="contact_person_usertype"  required>
													<option value="">Please Select</option>
													<option value="Facility Manager">Facility Manager</option>
													<option value="Dispatcher">Logistics Manager</option>
													</select></th>
													<th>Is-Active<input type="checkbox" id="isactive" name="isactive" checked></th>
													<th>Is-Default<input type="checkbox" id="isdefault" name="isdefault" ></th>
													<th><button type="submit" class="btn btn-primary my-1">Submit</button></th>
												</form>
												</tr>
												<tr>
													<th>Name</th>
													<th>Contact No.</th>
													<th>Email</th>
													<th>Usertype</th>
													<th>Is-Active</th>
													<th>Is-Default</th>
													<th>Edit</th>
												</tr>
											</thead>
											<tbody id="divcontactdetails">
											
											</tbody>
										</table>
									</div>
								</div>
								</div>
								
							</div>
						
							
					</div>
				</div>
				<!-- Main container end -->
@else
<div class="main-container">

            <!-- Page header start -->
            <div class="page-header text-center">

                <!-- Breadcrumb start -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">You are not allowed for this page.</li>
                </ol>


            </div>

        </div>
@endif
<script>


	$("#contactdetailssection").hide();
	
	
	getcontactdetails(<?php echo $id; ?>);
	

 function getcontactdetails(warehouseid)
 {
	  var dataString = 'warehouseid=' + warehouseid;
	 $.ajax({
		type: "POST",
		url: "get/getwarehouse_contactdetails.php",
		data: dataString,
		cache: false,
		beforeSend: function () {
			$("#loading-wrapper").show();
		},
		complete: function () {
		   $("#loading-wrapper").hide();
		},
		success: function (data)
		{
			$("#divcontactdetails").empty();
			$("#divcontactdetails").append(data);
		},
		error: function (error) {
			swal("Error", error, "error");
		}
	});
   return false;
 }



 function setrowdata(id)
 {
	  var dataString = 'id=' + id;
	 $.ajax({
		type: "POST",
		url: "get/getwarehouse_contactdetails_foredit.php",
		data: dataString,
		dataType: 'json',
		cache: false,
		beforeSend: function () {
			$("#loading-wrapper").show();
		},
		complete: function () {
		   $("#loading-wrapper").hide();
		},
		success: function (data)
		{
			$("#row_id").val(data.id);
			$("#warehouse_id").val(data.warehouse_id);
			$("#contact_person_name").val(data.name);
			$("#contact_person_phone").val(data.contactno);
			$("#contact_person_email").val(data.email);
			$("#contact_person_usertype").val(data.usertype);
			
			if(data.isactive == '1')
			{
				$( "#isactive" ).prop( "checked", true );
			}
			else
			{
				$( "#isactive" ).prop( "checked", false );
			}
			if(data.isdefault == '1')
			{
				$( "#isdefault" ).prop( "checked", true );
			}
			else
			{
				$( "#isdefault" ).prop( "checked", false );
			}
			
		},
		error: function (error) {
			swal("Error", error, "error");
		}
	});
   return false;
 }
 
$("#contact_person_phone").keyup(function() {
	var raw_text =  $(this).val();
	var return_text = raw_text.replace(/[^0-9]/g,'');
	$(this).val(return_text);
});


	$.validator.addMethod("pwcheck", function(value) {
   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       && /[a-z]/.test(value) // has a lowercase letter
       && /\d/.test(value) // has a digit
});
	
	
	
	$( "#contactform" ).submit(function( event ) {
		var warehouse_id = document.getElementById("warehouse_id").value;
		var row_id = document.getElementById("row_id").value;
		var contact_person_email = document.getElementById("contact_person_email").value;
		var contact_person_name = document.getElementById("contact_person_name").value;
		var contact_person_phone = document.getElementById("contact_person_phone").value;
		var contact_person_usertype = document.getElementById("contact_person_usertype").value;
		if($("#isactive").prop("checked") == true){
			var isactive = '1';
		}
		else
		{
			var isactive = '0';
		}
		
		
		
		if($("#isdefault").prop("checked") == true){
			var isdefault = '1';
		}
		else
		{
			var isdefault = '0';
		}
		
		if(isactive == '0' && isdefault == '1')
		{
			swal("Error", "If user is not active then you cannnot set that user as default contact. or if user is default contact then you cannot deactivate that user.", "error");
			return false;
		}

		if(warehouse_id == '' || contact_person_email == '' || contact_person_name == '' || contact_person_phone == '' || contact_person_usertype == '')
		{
			swal("Error", "Please fill all fields.", "error");
		}
		else
		{
			
		   var dataString = 'warehouse_id=' + warehouse_id + '&row_id=' + row_id + '&contact_person_email=' + contact_person_email + '&contact_person_name=' + contact_person_name + '&contact_person_phone=' + contact_person_phone + '&isactive=' + isactive + '&contact_person_usertype=' + contact_person_usertype + '&isdefault=' + isdefault;
		   $.ajax({
				type: "POST",
				url: "set/addwarehouse_contactdetails.php",
				data: dataString,
				cache: false,
				beforeSend: function () {
					$("#loading-wrapper").show();
				},
				complete: function () {
				   $("#loading-wrapper").hide();
				},
				success: function (data)
				{
					if(data == 'success')
					{
						swal({
							title: "Success",
							timer: 800,
							showCancelButton: false,
							showConfirmButton: false
							});
						$("#row_id").val('');
						$("#contact_person_email").val('');
						$("#contact_person_name").val('');
						$("#contact_person_phone").val('');
						$("#contact_person_usertype").val('');
						$( "#isdefault" ).prop( "checked", false );
						getcontactdetails(warehouse_id);
					}
					else
					{
						swal("Error", data, "error");
					}
				},
				error: function (error) {
					swal("Error", error, "error");
				}
			});
		}
	  
		event.preventDefault();
	});



	
	
	$( "#myform" ).validate({
	  rules: {
		warehouse: {
		  required: true
		},
		address_street: {
		  required: true
		},
		address_city: {
		  required: true
		},
		address_state: {
		  required: true
		},
		address_zip: {
		  required:true
		},
		warehouse_type: {
		  required:true
		}
	  },
	   submitHandler: function(form) {
		   
				var id = document.getElementById("id").value;
			   var warehouse = document.getElementById("warehouse").value;
			   var address_street = document.getElementById("address_street").value;
			   var address_city = document.getElementById("address_city").value;
			   var address_state = document.getElementById("address_state").value;
			   var address_zip = document.getElementById("address_zip").value;
			   var warehouse_type = document.getElementById("warehouse_type").value;
			   
			   var dataString = 'id=' + id + '&warehouse=' + warehouse + '&address_street=' + address_street + '&address_city=' + address_city + '&address_state=' + address_state+ '&address_zip=' + address_zip + '&warehouse_type=' + warehouse_type;
			   $.ajax({
					type: "POST",
					url: "set/addwarehouse.php",
					data: dataString,
					cache: false,
					beforeSend: function () {
						$("#loading-wrapper").show();
					},
					complete: function () {
					   $("#loading-wrapper").hide();
					},
					success: function (data)
					{
						if(isNaN(data))
						{
							swal("Error", data, "error");
						}
						else
						{

							swal({
							title: "Success",
							timer: 800,
							showCancelButton: false,
							showConfirmButton: false
							});


							$("#id").val(data);
							$("#warehouse_id").val(data);
							$("#contactdetailssection").show();
						}
						
					  
					},
					error: function (error) {
						swal("Error", error, "error");
					}
				});
			   return false;
			
		   
	   }
	});
	
	
</script>

  @include('layouts.footer')
@endsection
				