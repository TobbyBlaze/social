<!DOCTYPE html>
<html lang="en">
  <head>

	    <!-- ==============================================
		Title and Meta Tags
		=============================================== -->
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Neoconn</title>
		<meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta property="og:title" content="" />
        <meta property="og:url" content="" />
        <meta property="og:description" content="" />		
		
		<!-- ==============================================
		Favicons
		=============================================== --> 
		<link rel="icon" href="http://themashabrand.com/templates/Fluffs/assets/img/logo.jpg">
		<link rel="apple-touch-icon" href="http://themashabrand.com/templates/Fluffs/img/favicons/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="http://themashabrand.com/templates/Fluffs/img/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="http://themashabrand.com/templates/Fluffs/img/favicons/apple-touch-icon-114x114.png">
		
	    <!-- ==============================================
		CSS
		=============================================== -->
        <link type="text/css" href="assets/css/demos/photo.css" rel="stylesheet" />
				
		<!-- ==============================================
		Feauture Detection
		=============================================== -->
		<script src="http://themashabrand.com/templates/Fluffs/assets/js/modernizr-custom.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->	
		
  </head>

<body>

	 <!-- ==============================================
	 Header Section
	 =============================================== -->
     <section class="login">
      <div class="container">
       <div class="banner-content">
	   
			<h1><i class="fa fa-smile"></i> Neoconn</h1>
			<form method="post" class="form-signin" action="{{ route('register') }}">
				@csrf
				<h3 class="form-signin-heading">Please register</h3>
				<div class="form-group hidden">
					<input name="id" type="number" value="{{ mt_rand(100000, 999999) }}">
				</div>
				<div class="form-group">
					<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required placeholder="UserName">

					@if ($errors->has('name'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
				</div>
				<div class="form-group">
					<input id="reg_no" type="text" class="form-control{{ $errors->has('re_no') ? ' is-invalid' : '' }}" name="reg_no" value="{{ old('reg_no') }}" required placeholder="Registration Number">

					@if ($errors->has('reg_no'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('reg_no') }}</strong>
						</span>
					@endif
				</div>
				<div class="form-group">
					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}@mail.com" required>
					{{--<a class="btn btn-primary" disabled>@stu.edu.gh</a>--}}
					@if ($errors->has('email'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>
				<div class="form-group">
					<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password must be at least 8 characters long" required>

					@if ($errors->has('password'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
				</div>
				<div class="form-group">
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password must match Password." required>
				</div>
				<div class="form-group">
					<input id="phone_number_1" type="number" class="form-control{{ $errors->has('phone_number_1') ? ' is-invalid' : '' }}" name="phone_number_1" value="{{ old('phone_number_1') }}" required placeholder="0123456789">

					@if ($errors->has('phone_number_1'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('phone_number_1') }}</strong>
						</span>
					@endif
				</div>
				<button class="kafe-btn kafe-btn-mint btn-block" type="submit" id="reg" name="reg">{{ __('Register') }}</button>
				<br/>
				<a class="btn btn-dark " href="photo_login.html" role="button">Already have an account? Click Here.</a>
				<a class="btn btn-dark " href="photo_register.html" role="button">Forgot your password?</a>
			</form>
		
       </div><!--/. banner-content -->
      </div><!-- /.container -->
     </section> 
  
	 
	 
     <!-- ==============================================
	 Scripts
	 =============================================== -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/base.js"></script>

  </body>
</html>
