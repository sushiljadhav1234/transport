@extends('layouts.app')
@section('content')
    @if (Auth::user()->user_type == 'Admin')

				<!-- Main container start -->
				<div class="main-container">

					<!-- Row start -->
					<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="table-container">
						<div class="t-header">Warehouses<a href='addwarehouse.php' class='btn btn-primary' style="float:right">Add</a></div>
						<div class="table-responsive">
							<table id="basicExample" class="table custom-table">
								<thead>
									<tr>
										<th>Action</th>
										<th>Warehouse</th>
										<th>Business (Type)</th>
										<th>Freight</th>
										<th>Street</th>
										<th>City</th>
										<th>State</th>
										<th>Zip</th>
									</tr>
								</thead>
								<tbody>
								
								</tbody>
							</table>
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

@if (Auth::user()->user_type == 'Admin')
<script>



function deletewarehouse(id)
{
var token = '{{ csrf_token() }}';
	  swal({
		title: "Are you sure?",
		text: "",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Yes, I am sure',
		cancelButtonText: "No, cancel it",
		closeOnConfirm: false,
		closeOnCancel: true
	 },
	 function(isConfirm){

	   if (isConfirm){
			 var dataString = 'id=' + id;
			   $.ajax({
					type: "POST",
					url: "{{route('warehouse.delete')}}",
					data: {
						_token:token,
						id:id,
					},
					cache: false,
					beforeSend: function () {
						$("#loading-wrapper").show();
					},
					complete: function () {
					   $("#loading-wrapper").fadeOut(2000);
					},
					success: function (data)
					{
						if(data != "success")
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
                        $('#basicExample').DataTable().ajax.reload();
						}
						
					  
					},
					error: function (error) {
						swal("Error", error, "error");
					}
				});
			   return false;
	  
		} else {
		 
		}
	 });
	 
			   
			   
}


    $(document).ready(function () {
        $('#basicExample').DataTable({
           oLanguage: {
                sProcessing: '<div id="loading-wrapper"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>'
            },
          
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{route('getwarehouse')}}",
                type: "get",
            },
            columnDefs: [
                {"orderable": false, "targets": 7}
            ],
            columns: [{
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: 'warehouse_name',
                        name: 'name'
                    },
                    {
                        data: 'business.business_name',
                        name: 'email'
                    },
                    {
                        data: 'warehouse_frieght',
                        name: ' contact No. '
                    },
                    {
                        data: 'warehouse_street',
                        name: 'Usertype'
                    },
                    {
                        data: 'warehouse_city',
                        name: 'Warehouse'
                    },
                    {
                        data: 'warehouse_state',
                        name: 'Created On'
                    },
                    {
                        data: 'warehouse_zip',
                        name: 'Created By'
                    },

                ],
        });
    });
</script>
				
				

@endif
     @include('layouts.footer')
@endsection
				