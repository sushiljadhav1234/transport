@extends('layouts.app')

@section('content')
<div class="main-container">

					<!-- Page header start -->
					<div class="page-header">
						
						<!-- Breadcrumb start -->
						<ol class="breadcrumb">
							<li class="breadcrumb-item">Welcome {{Auth::user()->first_name}} </li>
						</ol>
						<!-- Breadcrumb end -->

						<!-- App actions start 
						<div class="app-actions">
							<button type="button" class="btn">Today</button>
							<button type="button" class="btn">Yesterday</button>
							<button type="button" class="btn">7 days</button>
							<button type="button" class="btn">15 days</button>
							<button type="button" class="btn active">30 days</button>
						</div>
						 App actions end -->

					</div>
					<!-- Page header end -->

					<!-- Row start -->
					<div class="row gutters">
					
					<?php if(Auth::user()->user_type == 'Applicant'){ ?>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								
							<div class="card">
								<div class="card-body">
									<div id="calendarSelectable"></div>
								</div>
							</div>

						</div>
					<?php } if(Auth::user()->user_type == 'Admin'){ ?>
					
						<div class="col-md-4">
						<a href="#">
							<div class="info-stats2">
								<div class="info-icon info">
									<i class="icon-users"></i>
								</div>
								<div class="sale-num">
									<h3>Clients</h3>
								</div>
							</div>
						</a>
						</div>
						
						
						<div class="col-md-4">
						<a href="#">
							<div class="info-stats2">
								<div class="info-icon danger">
									<i class="icon-file-text"></i>
								</div>
								<div class="sale-num">
									<h3>Quote Requests</h3>
								</div>
							</div>
						</a>
						</div>
						
						<div class="col-md-4">
						<a href="#">
							<div class="info-stats2">
								<div class="info-icon warning">
									<i class="icon-laptop_windows"></i>
								</div>
								<div class="sale-num">
									<h3>Jobs</h3>
								</div>
							</div>
						</a>
						</div>
						
						
						
						<div class="col-md-4">
						<a href="#">
							<div class="info-stats2">
								<div class="info-icon success">
									<i class="icon-user-plus"></i>
								</div>
								<div class="sale-num">
									<h3>New Client</h3>
								</div>
							</div>
						</a>
						</div>
					
					
						<div class="col-md-4">
						<a href="#">
							<div class="info-stats2">
								<div class="info-icon info">
									<i class="icon-plus1"></i>
								</div>
								<div class="sale-num">
									<h3>New Quote Request</h3>
								</div>
							</div>
						</a>
						</div>
						
						
						
						<div class="col-md-4">
						<a href="#" target="blank">
							<div class="info-stats2">
								<div class="info-icon info">
									<i class="icon-export"></i>
								</div>
								<div class="sale-num">
									<h3>Export Client Data</h3>
								</div>
							</div>
						</a>
						</div>
						
						
						
					<?php } ?>
					</div>
					<!-- Row end -->

				
				</div>
				<!-- Main container end -->
            @include('layouts.footer')
@endsection				