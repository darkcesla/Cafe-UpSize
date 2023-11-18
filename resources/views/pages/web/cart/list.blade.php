<div class="mycart">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-cart">
                        <h2>Keranjang Anda</h2>
                        <div class="table-responsive">
                            <table class="table  table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center">Nama Produk</td>
                                        <td class="text-center">Harga</td>
                                        <td class="text-center">Jumlah Pesanan</td>
                                        <td class="text-center">Total Harga</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                @foreach($carts as $item)
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="{{ url('/daftarmenu/menudetail', $item->product->id) }}">
                                                <img src="{{ asset('images/produk/'.$item->product->cover) }}" alt="image" title="image" class="img-responsive mx-auto d-block" style="width:100%; height:40vh" />
                                            </a>	
                                            <div class="name">
                                                <h4>{{ $item->product->title }}</h4>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $item->product->price }}</td>
                                        <td class="text-center">
                                            <p class="qtypara">
                                                <span id="minus{{ $item->id }}" class="minus" onclick="updateQuantity({{ $item->id }}, -1, {{ $item->product->price }})"><i class="icofont icofont-minus"></i></span>
                                                <input type="text" name="quantity" value="{{ $item->quantity }}" size="2" id="input-quantity{{ $item->id }}" class="form-control qty" readonly />
                                                <span id="add{{ $item->id }}" class="add" onclick="updateQuantity({{ $item->id }}, 1, {{ $item->product->price }})"><i class="icofont icofont-plus"></i></span>
                                                <input type="hidden" name="product_id" value="{{ $item->product->id }}" />
                                            </p>
                                        </td>
                                        <td class="text-center" id="price{{ $item->id }}">{{ $item->product->price * $item->quantity }}</td>
                                        <script>
                                            function updateQuantity(itemId, change, price) {
                                                var inputQuantity = document.getElementById('input-quantity' + itemId);
                                                var priceElement = document.getElementById('price' + itemId);
                                                
                                                
                                                var quantity = parseInt(inputQuantity.value) + change;
                                                if (quantity < 1) {
                                                    quantity = 1;
                                                }
                                                
                                                inputQuantity.value = quantity;
                                                priceElement.textContent = (price * quantity).toFixed(2);
                                                calculateTotal();
                                            }
                                        </script>
                                        <td class="text-center">
                                            <form action="{{ route('web.cart.destroy', $item->id) }}"  method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?')">
                                                    <i class="icofont icofont-close-line"></i>
                                                </button>
                                            </form>                                                
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                            <tr>
                                <td colspan="5">
                                    <h3 class="text-right" id="subtotal">TOTAL - $0.00</h3>
                                    <div class="buttons pull-right">
                                        <a href="{{ route('web.checkout.customer') }}" class="btn btn-primary">Pesan</a>
                                    </div>
                                </td>
                            </tr> 
                            <script>
                                function calculateTotal() {
                                    var prices = document.querySelectorAll("[id^='price']");
                                    var subtotal = 0;
                                    
                                    prices.forEach(function(priceElement) {
                                        subtotal += parseFloat(priceElement.textContent);
                                    });
                                    
                                    document.getElementById('subtotal').textContent = "SUBTOTAL : Rp." + subtotal.toFixed(2);
                                }
                                
                                calculateTotal();
                            </script>
                            </table>
                        </div>
                    </div>
                </div>	
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#checkout').hide();
        get_cart();
    });

    function update_quantity(url) {
        $.ajax({
            url: url,
            type: 'PATCH',
            success: function(data) {
                $('.total-product-price').html(data.subtotal);
                $('.data-product').attr('data-quantity', data.quantity);
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
                load_list(1);
            }
        });

    }

    function get_cart() {
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

    function hapus_cart(title, confirm_title, deny_title, method, route) {
        Swal.fire({
            title: title,
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: confirm_title,
            denyButtonText: deny_title,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: method,
                    url: route,
                    dataType: 'json',
                    beforeSend: function() {

                    },
                    success: function(response) {
                        if (response.alert == "success") {
                            toastr.success(response.message);
                            $('.top-cart-number').html(response.total_item ?? 0);
                            load_list(1);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                });
            }
        });
    }
</script>