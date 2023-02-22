@extends('layouts.app')

@section('content')
    <div class="container">
			
			<form role="form" id="login_form" method="POST" action="{{route('login.post')}}">
			@csrf
				<div class="row justify-content-md-center">
					<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
						<div class="login-screen">
							<div class="login-box">
								<!--<div class="col-md-12 text-center"><a href="#" class="login-logo"><img src="img/logo.png" alt="logo"></a></div>-->
								<div class="col-md-12 text-center"><a href="#" class="login-logo">TRANSPORT MANAGEMENT SYSTEM</a></div>
								<h5>Welcome back,<br />Please Login to your Account.</h5>
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Email Address or Username" name="email" id="email"/>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" placeholder="Password" name="password" id="password"/>
								</div>
								
								<div class="form-group">
								
								</div>
								<div class="actions mb-4">
								<!----
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="remember_pwd">
										<label class="custom-control-label" for="remember_pwd">Remember me</label>
									</div>
									-->
									<button type="submit" name="btnlogin" class="btn btn-success">Login</button>
								</div>
								<!----
								<div class="forgot-pwd">
									<a class="link" href="forgot-pwd.html">Forgot password?</a>
								</div>
								
								<hr>
								<div class="actions align-left">
									<a href="signup.html" class="btn btn-info ml-0">Create an Account</a>
								</div>
								
								-->
							</div>
						</div>
					</div>
				</div>
			</form>

		</div>
    @endsection

