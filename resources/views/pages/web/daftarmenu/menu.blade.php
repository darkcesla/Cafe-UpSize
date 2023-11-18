<x-web-layout title="Menu">
	<div class="banner">
		<img src="{{ asset('assets/images/shop/back.jpg') }}" class="img-responsive bg" alt="banner-top" title="banner-top">
		<div class="container">
			<div class="matter">
				<div class="crumb">
					<h2>Daftar Menu</h2>
					<ul class="list-inline">
						<li><a href="{{ (url('/')) }}">Beranda</a></li>
						<li><a href="{{ url('/daftarmenu') }}">Daftar Menu</a></li>
					</ul>
				</div>
				<div class="col-sm-6 order col-sm-offset-3">
					<form action="/daftarmenu/search" class="form-horizontal search-icon" method="GET">
						<fieldset>
							<div class="form-group">
								<input name="search" value="" placeholder="Kata Kunci" class="form-control" type="search">
							</div>
							<button type="submit" class="btn"><i class="icofont icofont-search"></i>Penelusuran</button>
						</fieldset>
					</form>
					<br>
					<form action="{{ url('/daftarmenu/filter') }}" class="form-horizontal filter-icon" method="GET">
						<div class="form-group">
							<select name="filter" class="form-control">
								<option value="">Semua</option>
								<option value="makanan">Makanan</option>
								<option value="minuman">Minuman</option>
							</select>
						</div>
						<button type="submit" class="btn btn-primary">Filter</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="shop">
		<div class="container">
			<div class="row ">
				<div class="col-sm-12 m-5 col-12 mainpage">
					<div class="row" style="margin-left: 10%; margin-right:10%">
						@if(isset($message))
							<div class="alert alert-info">
								{{ $message }}
							</div>
						@endif
						@if(isset($filter))
							<div class="alert alert-info">
								Menampilkan menu {{ ucfirst($filter) }}
							</div>
						@endif
						@foreach ($product as $item)
						<div class="product-layout product-grid col-lg-4 col-md-4 col-sm-12 mx-auto col-xs-12">
							<div class="product-thumb">
								<div class="image">
									<a href="{{ url('/daftarmenu/menudetail', $item->id) }}">
										<img src="{{ asset('images/produk/'.$item->cover) }}" alt="image" title="image" class="img-responsive mx-auto d-block" style="width:100%; height:40vh" />
									</a>									  
								</div>
								<div class="caption">
									<h4 style="font-size: 26px;">{{ $item -> title }}</h4>
									<h5 style="font-size: 20px;">Stok :{{ $item-> stock }}</h5>
									<div class="price" style="font-size: 24px;">{{ $item -> price }}</div>
									<p>{{ $item-> description }}</p>
								</div>
							</div>
						</div>
						@endforeach	
					</div>
					<div class="text-center">
						{{ $product->links('theme.web.custom') }}
					</div>
				</div>
			</div>
		</div>
	</div>
</x-web-layout>