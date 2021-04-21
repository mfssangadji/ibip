<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - Control Panel</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/animate/animate.css') }}">	
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/animsition/css/animsition.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/select2/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/daterangepicker/daterangepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/main.css') }}">
	<!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.5/sweetalert2.min.css" integrity="sha512-gX6K9e/4ewXjtn8Q/oePzgIxs2KPrksR4S2NNMYLxenvF7n7eNon9XbqQxb+5jcqYBVCcncIxqF6fXJYgQtoAg==" crossorigin="anonymous" />
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-b-160 p-t-50">
				<form class="login100-form validate-form" method="post" action="loginpost">
					@csrf
					<span class="login100-form-title p-b-43">
						Login
					</span>
					<div class="wrap-input100 rs1">
						<input class="input100" type="email" required name="email">
						<span class="label-input100">Email</span>
					</div>
					<div class="wrap-input100 rs2">
						<input class="input100" type="password" required name="password">
						<span class="label-input100">Password</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btn_l">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Sweet Alert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.5/sweetalert2.min.js" integrity="sha512-+uGHdpCaEymD6EqvUR4H/PBuwqm3JTZmRh3gT0Lq52VGDAlywdXPBEiLiZUg6D1ViLonuNSUFdbL2tH9djAP8g==" crossorigin="anonymous"></script>
	<script src="{{ asset('admin/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('admin/vendor/animsition/js/animsition.min.js') }}"></script>
	<script src="{{ asset('admin/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('admin/vendor/select2/select2.min.js') }}"></script>
	<script src="{{ asset('admin/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('admin/vendor/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('admin/vendor/countdowntime/countdowntime.js') }}"></script>
	<script src="{{ asset('admin/js/main.js') }}"></script>
</body>
</html>