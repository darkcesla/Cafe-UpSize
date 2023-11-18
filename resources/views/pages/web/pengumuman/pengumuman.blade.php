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
                <h4>Pengumuman Terbaru</h4>
                @foreach($pengumumans as $item)
                    <?php echo"===================================================="?>
                    <h3>{{ $item->judul }}</h3>
                    @if ($item->image)
                        <img src="/images/{{ $item->image }}" alt="Gambar Pengumuman" width="500px">
                    @endif
                    <p>{{ $item->konten }}</p>
                    <br><br>
                @endforeach
                <br><br><br><br><br><br>
                <br><br><br><br><br><br>
            </div>
        </div>
    </div>

</x-web-layout>