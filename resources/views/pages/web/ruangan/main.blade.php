<x-web-layout title="Ruangan">
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    
    tr:nth-child(even) {
      background-color: #dddddd;
    }
    .justify-content-end {
      justify-content: end;
      display: flex;
    }
    .reservation-button {
      margin-bottom: 10px;
    }
    .pagination-container {
      margin-top: 10px;
    }
  </style>
  <div class="bread-crumb">
    <img src="{{ asset('assets/images/banner_top.jpg') }}" class="img-responsive" alt="banner-top" title="banner-top">
    <div class="container">
      <div class="matter">
        <h2>Pemesanan</h2>
        <ul class="list-inline">
          <li><a href="{{ (url('/')) }}">Beranda</a></li>
          <li><a href="{{ url('/ruangan') }}">Pemesanan Meja</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="reserved mar-b">
    <div class="container">
      <div class="row ">
        <div class="col-sm-12 commontop text-center">
          <h4>Pemesanan Meja</h4>
          <hr>
          <p>Anda dapat memesan ruangan kami dengan mudah melalui pemesanan online atau melalui tim pelayanan kami yang ramah.
            Kami menyediakan pilihan ruangan yang nyaman dan dilengkapi dengan fasilitas modern, seperti meja rapat, layar proyektor,
            dan akses internet yang cepat. Setiap ruangan dirancang untuk memberikan lingkungan yang kondusif bagi pertemuan atau acara Anda.</p>
        </div>
        <div class="col-sm-6 order col-sm-offset-3">
          <form action="/ruangan/search" class="form-horizontal search-icon" method="GET">
              <fieldset>
                  <div class="form-group">
                      <input name="search" value="{{ request('search') }}" placeholder="Kata Kunci" class="form-control" type="search">
                  </div>
                  <button type="submit" class="btn">Penelusuran</button>
              </fieldset>
          </form>
          <br>
          @if(isset($message))
          <div class="alert alert-danger mt-3">
              {{ $message }}
          </div>
          @endif
        </div>      
        <div class="blog-area full-blog blog-standard full-blog grid-colum default-padding col-md-12">
          <div class="reservation-button justify-content-end"> 
            <button type="button" class="btn-primary" onclick="location.href='{{ url('/booking/create') }}';">Pemesanan</button> 
          </div>
          <table>
            <tr>
              <th>No</th>
              <th>Gambar</th>
              <th>Nomor Meja</th>
              <th>Deskripsi</th>
              <th>Status Meja</th>
            </tr>
            @foreach($meja as $item)
            <tr>
              <th>{{ $item->id }}</th>
              <th>
                <img src="{{ asset('images/meja/'.$item->cover) }}" alt="image" title="image" class="img-responsive mx-auto d-block" style="width:100%; height:40vh" />
              </th>
              <th>{{ $item->meja }}</th>
              <th>{{ $item->description }}</th>
              <th>{{ $item->status }}</th>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
      <div class="pagination-container text-center">
        {{ $meja->links('theme.web.custom') }}
      </div>
    </div>
  </div>
</x-web-layout>
