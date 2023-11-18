<x-web-layout title="cart">
    <div class="bread-crumb">
		<img src="{{ asset('assets/images/banner_top.jpg') }}" class="img-responsive" alt="banner-top" title="banner-top">
		<div class="container">
			<div class="matter">
				<h2>Keranjang</h2>
				<ul class="list-inline">
					<li><a href="{{ (url('/')) }}">Beranda</a></li>
					<li><a href="{{ url('/daftarmenu') }}">Keranjang</a></li>
				</ul>
			</div>
		</div>
	</div>
    <div id="list_result">
        @if (Auth::check())
            <!-- Tampilkan konten keranjang jika pengguna telah login -->
            <!-- Tempatkan kode yang berhubungan dengan konten keranjang di sini -->
            @else
            <!-- Tampilkan pesan bahwa pengguna belum login -->
            <div class="container">
                <div class="text-center">
                    <h3>Anda belum login</h3>
                    <p>Silakan login untuk melihat keranjang Anda.</p>
                </div>
            </div>
        @endif
    </div>
    @section('script')
        <script>
            load_list(1);
            $(document).ready(function() {
                load_cart();
            });

            function update_quantity(url) {
                $.ajax({
                    url: url,
                    type: 'PATCH',
                    success: function(data) {
                        $('.total-product-price').html(data.subtotal);
                        $('.data-product').attr('data-quantity', data.quantity);
                        load_cart(localStorage.getItem("route_cart"));
                        load_list(1);
                    }
                });
            }

            function input_quantity(url) {
                let data = "quantity=" + $('#qty').val();
                $.ajax({
                    url: url,
                    type: 'PATCH',
                    data: data,
                    success: function(data) {
                        $('.total-product-price').html(data.subtotal);
                        $('#qty').val(data.quantity);
                        load_cart(localStorage.getItem("route_cart"));
                        load_list(1);
                    }
                });
            }

            function load_cart() {
                $('.data-product').each(function() {
                    var price = $(this).data('price');
                    var quantity = $(this).data('quantity');
                    var total = price * quantity;
                    $(this).find('.total-product-price').html('Rp ' + total.toFixed(2));
                    $(this).find('.total-product-price').data('subtotal', total);
                });
                var total_price = 0;
                $('.total-product-price').each(function() {
                    total_price += $(this).data('subtotal');
                });
                $('#cart-total').html('Rp ' + total_price.toFixed(2));
            }

            function tombol_hapus(url) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function(data) {
                        load_cart(localStorage.getItem("route_cart"));
                        load_list(1);
                    }
                });
            }
        </script>
    @endsection
</x-web-layout>