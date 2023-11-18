<html>
    <head>
        <title>Struk Pembayaran</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    </head>
    <body>
        <style type="text/css">
            table tr td,
            table tr th {
            font-size: 9vh;
            }
        </style>
        @if ($order->payment != 'Cash')
            <center>
                <h2>Transaksi Non Tunai</h2>
                <h4>Cafe UpSize</h4>
                <p> 
                    Jl. Porsea, Jl. Balige, Sigumpar Dangsina, <br />
                    Kec. Sigumpar, Toba, Sumatera Utara 22381
                </p>
            </center>
            <div class="p-5 mx-5">
                <div class="" style="text-align: left; line-height: 0.5;">
                    <p>Nama : {{ $order->user->namalengkap }}</p>
                    <p>Hari/Tanggal : {{ $order->created_at->translatedFormat('l, d-m-Y') }}</p>
                    <p>ID : {{ $order->code }}</p>
                </div><br>
                <table class=" col-12">
                    <tbody>
                        @foreach ($order->orderDetails as $item)
                            <tr>
                                <td class="text-end" style="width: 50%">{{ $item->product->title }}
                                </td>
                                <td class="" style="width: 20%">{{ $item->quantity }}</td>
                                <td class="">Rp.
                                    {{ number_format($item->product->price * $item->quantity, 2, '.', ',') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr />
                <table class="col-12">
                    <tbody>
                        <tr>
                            <td style="width:50%;">SubTotal</td>
                            <td style="width: 20%"></td>
                            <td>Rp. {{ number_format($order->total, 2, '.', ',') }}</td>
                        </tr>
                        <tr>
                            <td style="width:50%;">Total</td>
                            <td style="width: 20%"></td>
                            <td>Rp. {{ number_format($order->total, 2, '.', ',') }}</td>
                        </tr>
                    </tbody>
                </table>
                <hr />
                <table class="col-12">
                    <tbody>
                        <tr>
                            <td style="width:50%;" class="text-nowrap">Metode Pembayaran</td>
                            <td>:</td>
                            <td>{{ $item->order->payment }}</td>
                        </tr>
                        <tr>
                            <td style="padding-right: 35px" class="text-nowrap">Status</td>
                            <td>:</td>
                            <td>Lunas</td>
                        </tr>
                    </tbody>
                </table>
                <hr />
            </div>
            @else
            <center>
                <h2>Transaksi Tunai</h2>
                <h4>Cafe UpSize</h4>
                <p> 
                    Jl. Porsea, Jl. Balige, Sigumpar Dangsina, <br />
                    Kec. Sigumpar, Toba, Sumatera Utara 22381
                </p>
            </center>
            <div class="p-5 mx-5">
                <div class="" style="text-align: left; line-height: 0.5;">
                    <p>{{ $order->user->namalengkap }}</p>
                    <p>{{ $order->created_at->translatedFormat('l, d-m-Y') }}</p>
                    <p>ID : {{ $order->code }}</p>
                </div><br>
                <table class=" col-12">
                    <tbody>
                        @foreach ($order->orderDetails as $item)
                            <tr>
                                <td class="text-end" style="width: 50%">{{ $item->product->title }}
                                </td>
                                <td class="" style="width: 20%">{{ $item->quantity }}</td>
                                <td class="">Rp.
                                    {{ number_format(($item->product->price + $item->product->price / 100) * $item->quantity, 2, '.', ',') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr />
                <table class="col-12">
                    <tbody>
                        <tr>
                            <td style="width:50%;">SubTotal</td>
                            <td style="width: 20%"></td>
                            <td>Rp. {{ number_format($order->total, 2, '.', ',') }}</td>
                        </tr>

                        <tr>
                            <td style="width: 50%">Diskon</td>
                            <td style="width: 20%"></td>
                            <td class="">- Rp.0</td>
                        </tr>
                        <tr>
                            <td style="width:50%;">Total</td>
                            <td style="width: 20%"></td>
                            <td>Rp. {{ number_format($order->total, 2, '.', ',') }}</td>
                        </tr>
                    </tbody>
                </table>
                <hr />
                <table class="col-12">
                    <tbody>
                        <tr>
                            <td style="width:50%;" class="text-nowrap">Metode Pembayaran</td>
                            <td>:</td>
                            <td>{{ $item->order->payment }}</td>
                        </tr>
                        <tr>
                            <td style="padding-right: 35px" class="text-nowrap">Status</td>
                            <td>:</td>
                            <td>Lunas</td>
                        </tr>
                    </tbody>
                </table>
                <hr />
            </div>
        @endif
        <footer class="mt-4">
            <center>
                <h5>TerimaKasih</h5>
                <h6>~ Semoga Anda Senang Dengan Pelayanan Kami ~</h6>
            </center>
        </footer>
    </body>
</html>