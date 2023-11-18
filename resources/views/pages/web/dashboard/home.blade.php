<x-web-layout title="Home">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<div class="slide">
		<div class="banner">
			<img src="{{ asset('assets/images/shop/back.jpg') }}" class="img-responsive bg" alt="banner-top" title="banner-top">
		</div>
		<div class="slide-detail col-lg-6 col-md-9 col-sm-8">
			<div class="col-sm-12">
				<h4>UpSize Coffee</h4>
				<p>Selamat datang di Coffee Shop kami, tempat yang menyajikan secangkir kebahagiaan dalam setiap tegukan.</p>
				<button type="button" class="btn-primary" onclick="location.href='{{ url('daftarmenu') }}';">Pesan Sekarang</button> 
			</div>
		</div>	
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 commontop text-center">
				<h4>UpSize Coffe</h4>
				<hr>
				<p>Kami berdedikasi untuk menyediakan pengalaman kopi terbaik bagi Anda, karena bagi kami, kopi adalah seni yang kami cintai dan hidupkan setiap harinya.
					Kami menggunakan biji kopi pilihan yang dipanggang dengan penuh keahlian untuk menghasilkan cita rasa yang kaya, menggoda selera, 
					dan membawa Anda dalam perjalanan yang tak terlupakan ke dunia rasa kopi yang sejati.</p>
			</div>
		</div>
	</div>
	<div class="service">
		<div class="container">
			<div class="row ">
				<div class="col-sm-12 col-xs-12 commontop text-center">
					<h4>Layanan Kami</h4>
					<hr>
					<p>Kunjungi Coffee Shop kami dan nikmati kesempurnaan kopi dalam suasana yang nyaman dan santai.
						Kami berjanji bahwa setiap kunjungan Anda akan menjadi pengalaman yang memuaskan dan menggugah selera.</p>
				</div>
				<div class="col-sm-4 col-xs-12">
					<div class="box text-center">
						<img src="{{ asset('assets/images/about/icon1.png') }}" class="img-responsive" alt="icon" title="icon" />
						<h4>Koki Terbaik</h4>
						<p>Dilayani oleh tim pelayan kami yang ramah dan berpengalaman, kami berkomitmen untuk menjaga standar kualitas yang tinggi dalam setiap cangkir yang kami sajikan.
							Kami percaya bahwa kualitas adalah kunci untuk menciptakan pengalaman kopi yang memuaskan dan berkesan.</p>
					</div>
				</div>
				<div class="col-sm-4 col-xs-12">
					<div class="box text-center">
						<img src="{{ asset('assets/images/about/icon2.png') }}" class="img-responsive" alt="icon" title="icon" />
						<h4>Meja</h4>
						<p>Dalam Coffee Shop kami, setiap meja adalah tempat di mana cerita terbentuk dan hubungan terjalin. Kami berkomitmen untuk menyediakan
							ruang yang memungkinkan Anda mengambil napas dalam keriuhan kehidupan sehari-hari, sambil menikmati secangkir kopi yang sempurna.</p>
					</div>
				</div>
				<div class="col-sm-4 col-xs-12">
					<div class="box text-center">
						<img src="{{ asset('assets/images/about/icon3.png') }}" class="img-responsive" alt="icon" title="icon" />
						<h4>Penjualan Terbaik</h4>
						<p>Namun, Coffee Shop kami tidak hanya tentang kopi. Kami juga menawarkan berbagai pilihan menu terbaik yang akan memanjakan lidah Anda.
							Mulai dari Taro frezzee, Matcha frezee, Choco frezzee, Ayam geprek, Nasi goreng yang menggugah selera, 
							hingga hidangan penutup manis yang memanjakan nafsu Anda. Setiap hidangan kami disiapkan dengan cinta dan 
							menggunakan bahan-bahan berkualitas tinggi untuk memberikan kenikmatan yang tak terlupakan.</p>
					</div>
				</div>
				<div class="col-sm-4 col-xs-12">
					<div class="box text-center">
						<img src="{{ asset('assets/images/about/icon4.png') }}" class="img-responsive" alt="icon" title="icon" />
						<h4>Penawaran Khusus</h4>
						<p>Kami selalu mengutamakan kepuasan pelanggan kami, dan penawaran khusus kami dirancang untuk mencerminkan komitmen kami dalam memberikan pengalaman yang luar biasa.
							Kami terus memperbarui penawaran kami untuk memastikan Anda selalu merasa istimewa setiap kali mengunjungi Coffee Shop kami.</p>
					</div>
				</div>
				<div class="col-sm-4 col-xs-12">
				</div>
				<div class="col-sm-4 col-xs-12">
					<div class="box text-center">
						<img src="{{ asset('assets/images/about/icon5.png') }}" class="img-responsive" alt="icon" title="icon" />
						<h4>Pembayaran Dengan Kartu</h4>
						<p>Kami menghargai kenyamanan dan kepuasan pelanggan kami, dan itu termasuk memudahkan proses pembayaran.
							Dengan layanan pembayaran kartu yang kami sediakan, Anda dapat fokus pada menikmati hidangan dan minuman berkualitas tinggi kami,
							tanpa harus khawatir tentang transaksi.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="team">
		<div class="container">
			<div class="row ">
				<div class="col-sm-12 col-xs-12 commontop text-center">
					<h4>Karyawan</h4>
					<hr>
				</div>
				<div class="col-sm-3 col-xs-12">
					<div class="box">
						<img src="{{ asset('assets/images/about/1.jpg') }}" class="img-responsive" alt="icon" title="icon" />
						<div class="caption text-center">
							<h4>Pemilik</h4>
							<h4>Oswaldz Nababan</h4>
							<ul class="list-inline social">
								<li><a href="https://www.facebook.com/" target="_blank"><i class="icofont icofont-social-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/" target="_blank"><i class="icofont icofont-social-instagram"></i></a></li>
								<li><a href="https://wa.me/6282277592764" target="_blank"><i class="icofont icofont-social-whatsapp"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-xs-12">
					<div class="box">
						<img src="{{ asset('assets/images/about/4.jpg') }}" class="img-responsive" alt="icon" title="icon" />
						<div class="caption text-center">
							<h4>Kasir</h4>
							<h4>Runita Simorangkir</h4>
							<ul class="list-inline social">
								<li><a href="https://www.facebook.com/" target="_blank"><i class="icofont icofont-social-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/" target="_blank"><i class="icofont icofont-social-instagram"></i></a></li>
								<li><a href="https://wa.me/6282277592764" target="_blank"><i class="icofont icofont-social-whatsapp"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-xs-12">
					<div class="box">
						<img src="{{ asset('assets/images/about/3.jpg') }}" class="img-responsive" alt="icon" title="icon" />
						<div class="caption text-center">
							<h4>Koki</h4>
							<h4>Ivan Imannuel Pasaribu</h4>
							<ul class="list-inline social">
								<li><a href="https://www.facebook.com/" target="_blank"><i class="icofont icofont-social-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/" target="_blank"><i class="icofont icofont-social-instagram"></i></a></li>
								<li><a href="https://wa.me/6282277592764" target="_blank"><i class="icofont icofont-social-whatsapp"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-xs-12">
					<div class="box">
						<img src="{{ asset('assets/images/about/2.jpg') }}" class="img-responsive" alt="icon" title="icon" />
						<div class="caption text-center">
							<h4>Pengelola</h4>
							<h4>Siti Tampubolon</h4>
							<ul class="list-inline social">
								<li><a href="https://www.facebook.com/" target="_blank"><i class="icofont icofont-social-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/" target="_blank"><i class="icofont icofont-social-instagram"></i></a></li>
								<li><a href="https://wa.me/6282277592764" target="_blank"><i class="icofont icofont-social-whatsapp"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-xs-12">
				</div>
				<div class="col-sm-3 col-xs-12">
					<div class="box">
						<img src="{{ asset('assets/images/about/4.jpg') }}" class="img-responsive" alt="icon" title="icon" />
						<div class="caption text-center">
							<h4>Peracik Kopi</h4>
							<h4>Reynaldi Silaban </h4>
							<ul class="list-inline social">
								<li><a href="https://www.facebook.com/" target="_blank"><i class="icofont icofont-social-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/" target="_blank"><i class="icofont icofont-social-instagram"></i></a></li>
								<li><a href="https://wa.me/6282277592764" target="_blank"><i class="icofont icofont-social-whatsapp"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-xs-12">
					<div class="box">
						<img src="{{ asset('assets/images/about/4.jpg') }}" class="img-responsive" alt="icon" title="icon" />
						<div class="caption text-center">
							<h4>Pelayan</h4>
							<h4>Kristamora Simanjuntak</h4>
							<ul class="list-inline social">
								<li><a href="https://www.facebook.com/" target="_blank"><i class="icofont icofont-social-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/" target="_blank"><i class="icofont icofont-social-instagram"></i></a></li>
								<li><a href="https://wa.me/6282277592764" target="_blank"><i class="icofont icofont-social-whatsapp"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-xs-12">
				</div>
			</div>
		</div>
	</div>
	<div class="contactus">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-xs-12 commontop text-center">
					<h4>Hubungi Kami</h4>
					<hr>
				</div>
				<div class="col-sm-12 col-xs-12">
					<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.366301784834!2d99.14791481467188!3d2.3835756982629306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e015dfbb674e7%3A0x6ef3130fd596ccc5!2sUp%20Size%20Coffee!5e0!3m2!1sen!2sid!4v1677636410802!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
				<div class="col-sm-12 col-xs-12 commontop text-center">
					<h4>Kritik & Saran</h4>
				</div>
				<form method="post" enctype="multipart/form-data" action="{{ route('kritiksaran.store') }}" class="form-horizontal col-sm-12" onsubmit="return checkLoginStatus()" onsubmit="return validateForm()">
					@csrf
					<div class="form-group">
						<div class="col-sm-12">
							<i class="icofont icofont-pencil-alt-5"></i>
							<textarea id="input-enquiry" class="form-control" name="kritiksaran" placeholder="Kritik & Saran Cafe UpSize">{{ old('kritiksaran') }}</textarea>
							@error('kritiksaran')
								<div class="alert alert-danger" style="color: red;">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="buttons text-left">
						<input class="btn btn-primary" type="submit" value="Kirim Pesan" />
					</div>
				</form>
				<div class="col-sm-12 col-xs-12 commontop text-center">
					<h4>Pengaduan Makanan & Minuman</h4>
				</div>
				<form method="post" enctype="multipart/form-data" action="{{ route('pengaduan.store') }}" class="form-horizontal col-sm-12" onsubmit="return checkLoginStatus()" onsubmit="return validateForm()">
					@csrf
					<div class="form-group">
						<div class="col-sm-12">
							<i class="icofont icofont-food-cart"></i>
							<select id="input-category" class="form-control" name="kategori">
								<option value="">Pilih Kategori</option>
								<option value="makanan">Makanan</option>
								<option value="minuman">Minuman</option>
							</select>
							@error('kategori')
							<div class="alert alert-danger">
								Silahkan Pilih Kategori Terlebih Dahulu.
							</div>
							@enderror
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<i class="icofont icofont-food-menu"></i>
							<input type="text" class="form-control" name="namamenu" placeholder="Nama Makanan atau Minuman" value="{{ old('namamenu') }}">
							@error('namamenu')
							<div class="alert alert-danger">
								Silahkan Isi Nama Produk Terlebih Dahulu.
							</div>
							@enderror
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<i class="icofont icofont-pencil-alt-5"></i>
							<textarea id="input-enquiry" class="form-control" name="pengaduan" placeholder="Pengaduan Produk">{{ old('pengaduan') }}</textarea>
							@error('pengaduan')
							<div class="alert alert-danger">
								Silahkan Pengaduan Anda Terlebih Dahulu.
							</div>
							@enderror
						</div>
					</div>
					<div class="buttons text-left">
						<input class="btn btn-primary" type="submit" value="Kirim Pesan" />
					</div>
				</form>				
			</div>
		</div>
	</div>
	<script>
		function checkLoginStatus() {
			if (!isLoggedIn()) {
				alert('Anda harus login untuk memberikan kritik dan saran.');
				return false; // Mencegah pengiriman formulir jika pengguna belum login
			}
			return true; // Lanjutkan pengiriman formulir jika pengguna telah login
		}
	
		function isLoggedIn() {
			// Implementasi pengecekan status login di sini
			// Misalnya, jika Anda menggunakan Laravel dengan blade template:
			return {{ Auth::check() ? 'true' : 'false' }};
		}
	</script>
	<script>
		function validateForm() {
			var message = document.getElementById("input-enquiry").value;
			if (message.trim() === "") {
				document.getElementById("error-message").innerText = "Please enter a message.";
				return false;
			}
			return true;
		}
	</script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-115890069-7');
	</script>
</x-web-layout>