@extends('layouts.app')
@section('content')
 @if (Auth::user()->user_type == 'Admin')



				<!-- Main container start -->
				<div class="main-container">

					<!-- Row start -->
					<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="table-container">
						<div class="t-header">Manage Job Tags<a href='{{route('jobstag.add')}}' class='btn btn-primary' style="float:right">Add</a></div>
						<div class="table-responsive">
							<table id="basicExample" class="table custom-table">
								<thead>
									<tr>
										<th>Action</th>
										<th>Job Tags</th>
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
<script>
    $(document).ready(function () {
        $('#basicExample').DataTable({
           oLanguage: {
                sProcessing: '<div id="loading-wrapper"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>'
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{route('getjobstags')}}",
                type: "get",
            },
            columnDefs: [
                {"orderable": false, "targets": 1}
            ],
             columns: [{
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: 'tagname',
                        name: 'Job Tags'
                    },
             ],
        });
    });
</script>
		
	
  @include('layouts.footer')
@endsection