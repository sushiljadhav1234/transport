@extends('layouts.app')
@section('content')

@if(Auth::user()->user_type == 'Admin')

				<!-- Main container start -->
				<div class="main-container">
				
				
					<div class="page-header text-center">
						
						<!-- Breadcrumb start -->
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
							
							Add Job Tag
							</li>
						</ol>
						

					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<form method="post" action ="{{route('jobstag.store')}}" id="myform" autocomplete="off">
                        @csrf
						<div class="row gutters">
							<div class="col-md-12">
								<div class="form-group">
									 @if(Session::has('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                            
                                        </div>
                                        @endif
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="tagname">Tag Name</label>
									<input type="text" class="form-control" value="" id="tagname" name="tagname" placeholder="Tag Name">
									@if ($errors->has('tagname'))
                                        <span class="text-danger">{{ $errors->first('tagname') }}</span>
                                    @endif
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
								<br>
									<button type="submit" name="sub" class="btn btn-primary my-1">Update</button>
									<a href="{{route('jobstag.index')}}" class="btn btn-primary my-1">Back</a>
								</div>
							</div>
							</div>
							
						</form>
					</div>
				</div>
				<!-- Main container end -->
<script>
	$( "#myform" ).validate({
	  rules: {
		tagname: {
		  required: true
		}
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
				