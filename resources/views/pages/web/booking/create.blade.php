<x-web-layout title="Form">
	<div class="bread-crumb">
		<img src="{{ asset('assets/images/banner_top.jpg') }}" class="img-responsive" alt="banner-top" title="banner-top">
		<div class="container">
			<div class="matter">
				<h2>Pemesanan</h2>
				<ul class="list-inline">
					<li><a href="{{ (url('/')) }}">Beranda</a></li>
					<li><a href="{{ url('/ruangan') }}">Formulir Pemesanan</a></li>
				</ul>
			</div> 
		</div>
	</div>
	<div class="reserved mar-b">
		<div class="container">
			<div class="row ">
				<div class="col-sm-12 commontop text-center">
					<h4>Formulir Pemesanan</h4>
					<hr>
					<p>Kami siap membantu Anda dalam mengatur setiap detail reservasi, mulai dari pemilihan menu makanan dan minuman yang sesuai dengan selera Anda,
						hingga penyesuaian ruangan sesuai dengan jumlah tamu dan kebutuhan teknis Anda. Tim kami akan bekerja sama dengan Anda untuk memastikan
						setiap acara yang Anda rencanakan berjalan dengan lancar dan memuaskan.</p>
					<hr>
				</div>
				<div class="col-sm-6 col-xs-12">
					<img src="{{ asset('assets/images/reservation.jpg') }}" class="img-responsive" alt="image" title="image" />
				</div>
				<div class="col-sm-6 col-xs-12">
					<form method="post" enctype="multipart/form-data" action="{{ route('booking.store') }}">
						@csrf
						@if (!Auth::check()) <!-- Menambahkan kondisi jika belum login -->
							<div class="alert alert-warning" role="alert">
								Silakan login terlebih dahulu untuk melakukan booking.
							</div>
						@endif
						<div class="form-group">
							<i class="icofont icofont-ui-calendar"></i><input name="book_date" value="Date" placeholder="date" id="datetimepicker" class="form-control" type="text">
							@error('book_date')
								<div class="alert alert-danger">
									Silahkan untuk melakukan penginputan tanggal beserta jam terlebih dahulu.
								</div>
							@enderror
						</div>
						<div class="form-group">
							<i class="fa fa-key"></i>							
							<select class="selectpicker form-control bs-select-hidden" name="meja_id">
								<option selected="" disabled>Nomor Meja</option>
								@foreach ($meja as $item)
									<option value="{{ $item->id }}">{{ $item->meja }}</option>
								@endforeach
							</select>
							@error('meja_id')
								<div class="alert alert-danger">
									Silahkan untuk melakukan pemilihan meja terlebih dahulu.
								</div>
							@enderror
						</div>
						<div class="form-group">
							<i class="icofont icofont-ui-message"></i>
							<textarea class="form-control" id="message" name="description" placeholder="Deskripsi"></textarea>
							@error('description')
								<div class="alert alert-danger">
									Silahkan untuk melakukan pengisian description terlebih dahulu.
								</div>
							@enderror
						</div>
						@if (Auth::check()) <!-- Menambahkan kondisi jika sudah login -->
							<button type="submit" class="btn-primary">Pesan Sekarang</button>
						@else
							<button type="button" class="btn-primary" onclick="showLoginAlert()">Pesan Sekarang</button>
						@endif
					</form>

					<div class="text-left"></div>	
				</div>
			</div>
		</div>
	</div>
	@section('css')
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.0/jquery.datetimepicker.css" integrity="sha512-/Ef7B82QK2/WK5lEP1rzzXC2tEP5437FenEsdCUJX8KY6FJ6sXfzGpnJLPDLayzwwl8wFzX1Ksbq41SkM0eUTQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	@endsection
	@section('script')
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.0/jquery.datetimepicker.full.min.js" integrity="sha512-Zsb24BFA6Bbhj6sc2WYGnjwSElEKYkkdmL7ImETdFklacNmcJS0Ny08qc5p64wF9XnzuK7Y3Ku0peWuYA8D7Ng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script>
			$(document).ready(function() {
				$(function() {
					var today = new Date();
					var minBookingDate = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 1); // Tanggal minimum untuk pemesanan (1 hari setelah hari ini)
					
					$('#datetimepicker').datetimepicker({
						format: 'Y-m-d H:i:s',
						timepickerScrollbar: true,
						step: 5,
						minDate: minBookingDate, // Tanggal minimum yang dapat dipilih
						yearStart: 2020,
						yearEnd: 2030,
						allowTimes: ['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'], // Jam operasional yang diperbolehkan
						onSelectDate: function(dp, $input) {
							console.log('Selected date: ' + dp.getDate());
						},
						onSelectTime: function(dp, $input) {
							console.log('Selected time: ' + dp.getTime());
						}
					});
				});
			});
		</script>			
		<script>
			function showLoginAlert() {
				alert('Silakan login terlebih dahulu untuk melakukan booking.');
				// Tambahkan kode lain sesuai kebutuhan, seperti redirect ke halaman login
			}
		</script>
	@endsection
</x-web-layout>