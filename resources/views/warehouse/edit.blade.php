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
						@csrf
						<div class="row gutters">
							<div class="col-md-12">
								<div class="form-group">
									
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="warehouse_name">Warehouse</label>
									<input type="text" class="form-control" value="{{$data->warehouse_name}}" id="warehouse_name" name="warehouse_name" placeholder="Warehouse">
									<input type="hidden" class="form-control" value="{{$data->id}}" id="id" name="id">
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="warehouse_name">Business</label>
									@php $business = $data['business']['business_name']." (". $data['business']['business_type'].")";@endphp
									<input type="text" class="form-control" value="{{$business}}" id="warehouse_name" name="warehouse_name" placeholder="Warehouse">
								</div>
							</div>
							
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="warehouse_street">Street</label>
									<input type="text" class="form-control" value="{{$data->warehouse_street}}" id="warehouse_street" name="warehouse_street" placeholder="Street">
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label for="warehouse_city">City</label>
									<input type="text" class="form-control"  value="{{$data->warehouse_city}}" id="warehouse_city" name="warehouse_city" placeholder="City">
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label for="warehouse_state">State</label>
									<input type="text" class="form-control"   value="{{$data->warehouse_state}}" id="warehouse_state" name="warehouse_state" placeholder="State">
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label for="warehouse_zip">Zip</label>
									<input type="text" class="form-control"   value="{{$data->warehouse_zip}}" id="warehouse_zip" name="warehouse_zip" placeholder="Zip">
								</div>
							</div>
							
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="warehouse_frieght">Freight</label>
									<select class="form-control"   id="warehouse_frieght" name="warehouse_frieght" >
									<option value="">Select Freight</option>
									<option <?php if($data->warehouse_frieght == 'Loading Dock'){ echo "selected"; } ?> value="Loading Dock">Loading Dock</option>
									<option <?php if($data->warehouse_frieght == 'Forklift'){ echo "selected"; } ?> value="Forklift">Forklift</option>
									<option <?php if($data->warehouse_frieght == 'Cannot Receive Freight'){ echo "selected"; } ?> value="Cannot Receive Freight">Cannot Receive Freight</option>
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
						
					</div>
				</div>
				<!-- Main container end -->
				<script>



					$.validator.addMethod("pwcheck", function(value) {
				return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
					&& /[a-z]/.test(value) // has a lowercase letter
					&& /\d/.test(value) // has a digit
				});
					
	
	
	
	
	$( "#myform" ).validate({
	  rules: {
		warehouse_name: {
		  required: true
		},
		warehouse_street: {
		  required: true
		},
		warehouse_city: {
		  required: true
		},
		warehouse_state: {
		  required: true
		},
		warehouse_zip: {
		  required:true
		},
		warehouse_frieght: {
		  required:true
		}
	  },
	   submitHandler: function(form) {
		   
				var id = document.getElementById("id").value;
			   var warehouse_name = document.getElementById("warehouse_name").value;
			   var warehouse_street = document.getElementById("warehouse_street").value;
			   var warehouse_city = document.getElementById("warehouse_city").value;
			   var warehouse_state = document.getElementById("warehouse_state").value;
			   var warehouse_zip = document.getElementById("warehouse_zip").value;
			   var warehouse_frieght = document.getElementById("warehouse_frieght").value;
			     var token = '{{ csrf_token() }}';
			   var dataString = 'id=' + id + '&warehouse_name=' + warehouse_name + '&warehouse_street=' + warehouse_street + '&warehouse_city=' + warehouse_city + '&warehouse_state=' + warehouse_state+ '&warehouse_zip=' + warehouse_zip + '&warehouse_frieght=' + warehouse_frieght;
			   $.ajax({
					type: "POST",
					url: "{{route('warehouse.update')}}",
					data: {
						_token:token,
						id:id,
						warehouse_name:warehouse_name,
						warehouse_street:warehouse_street,
						warehouse_city:warehouse_city,
						warehouse_state:warehouse_state,
						warehouse_zip:warehouse_zip,
						warehouse_frieght:warehouse_frieght
						},
					
					beforeSend: function () {
						$("#loading-wrapper").show();
					},
					complete: function () {
					   $("#loading-wrapper").hide();
					},
					success: function (data)
					
					{
						
						if(data.success == "Warehouse update successfully")
						{
						swal({
							title: "Success",
							timer: 800,
							showCancelButton: false,
							showConfirmButton: false
						});
						
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

  @include('layouts.footer')
@endsection
				