<x-app-layout title="Order Details">
    <div class="app-content main-content mt-4">
        <div class="side-app">
            <div class="main-container container-fluid">
                <div class="row row-sm">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Detail Product</h4>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title flex-grow-1 mb-0">Nomor Order: {{ $order->code }}</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="table-responsive table-card mb-1">
                                    <table class="table align-middle">
                                        <thead class="table-light text-muted">
                                            <tr>
                                                <th scope="col">Bukti Pembayaran</th>
                                                <th scope="col">Menu</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Jumlah</th>
                                                <th scope="col" class="text-end">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach ($order->orderDetails as $item)
                                                <tr>
                                                    <td>
                                                        <div class="col-xl-3 col-md-6 mx-auto">
                                                            <div class="product-img-slider sticky-side-div">
                                                                <img src="{{ asset('images/bukti_pembayaran/' . $item->order->image) }}"
                                                                    alt="" class="img-fluid d-block">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $item->product->title }}</td>
                                                    <td>Rp. {{ number_format($item->price) }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td class="fw-medium text-end">
                                                        Rp. {{ number_format($item->quantity * $item->product->price) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr class="border-top border-top-dashed">
                                                <td colspan="3"></td>
                                                <td colspan="2" class="fw-medium p-0">
                                                    <table class="table table-borderless mb-0">
                                                        <tbody>
                                                            <tr class="border-top border-top-dashed">
                                                                <th scope="row">SubTotal :</th>
                                                                <th class="text-end">Rp. {{ number_format($order->total) }}</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="hstack gap-2 justify-content-end">
                                    <a class="btn btn-light" href="{{ url('staff/historyproduk') }}">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
