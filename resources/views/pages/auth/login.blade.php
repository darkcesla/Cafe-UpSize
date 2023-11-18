<x-web-layout title="Login">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<div class="bread-crumb">
		<img src="{{ asset('assets/images/banner_top.jpg') }}" class="img-responsive" alt="banner-top" title="banner-top">
		<div class="container">
			<div class="matter">
				<h2>Masuk</h2>
				<ul class="list-inline">
					<li><a href="{{ (url('/')) }}">Beranda</a></li>
					<li><a href="#">Masuk</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="col-sm-5 padd0">
						<div class="leftside"></div>
						<div class="loginto">
							<div class="commontop text-center">
								<h4>Masuk</h4>
								<hr>
							</div>
							<hr>
							<hr>
							<hr>
							<hr>
							<hr>
							<hr>
							<p>Belum Memiliki Akun? Silahkan Membuat Akun Anda Dengan <a href=<li><a href="{{ url('/authreg') }}">Registrasi Sekarang</a>
							<hr>
							<hr>
							<hr>
							<hr>
							<hr>
							<hr>
						</div>
					</div>	
					<div class="col-sm-7 padd0">
						<div class="loginnow" style="display: flex; justify-content: center;">
							<form method="POST" action="{{ url('auth/login') }}" enctype="multipart/form-data" style="width: 100%;">
								@csrf
								@error('email')
								<div class="alert alert-danger">
									Silahkan Isi Email Anda Terlebih Dahulu.
								</div>
								@enderror
								<div class="form-group">
									<i class="icofont icofont-ui-message"></i>
									<input type="text" name="email" value="{{ old('email') }}" placeholder="Email" id="input-email" class="form-control" autocomplete="off" />
								</div>
								@error('password')
								<div class="alert alert-danger">
									Silahkan Isi Password Anda Terlebih Dahulu.
								</div>
								@enderror
								<div class="form-group">
									<i class="icofont icofont-lock"></i>
									<input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" autocomplete="off" />
								</div>
								<div style="text-align: center;">
									<button type="submit" value="Login" class="btn btn-primary" style="font-size: 15px; padding: 5px 10px; width: 80px; height: 40px; margin-top: 10px;">LOGIN</button>
								</div>
							</form>
						</div>
					</div>									  
				</div>
			</div>
		</div>
	</div>
</x-web-layout>