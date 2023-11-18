<x-app-layout title="Dashboard">
    <div id="content_list">
        <div class="app-content main-content mt-0">
            <div class="side-app">
                <div class="main-container container-fluid">
                    <div class="page-header">
                        <div>
                            <h1 class="page-title">Pengumuman</h1>
                        </div>
                    </div>			

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                
                    <form action="{{ route('admin.pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="konten" class="form-label">Konten</label>
                            <textarea name="konten" id="konten" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                
                    <div class="page-header">
                        <div>
                            <h1 class="page-title">Pengumuman</h1>
                        </div>
                    </div>	
                    <ul>
                        @foreach($pengumuman as $item)
                            <li>
                                <h3>{{ $item->judul }}</h3>
                                <p>{{ $item->konten }}</p>
                                @if ($item->image)
                                <p><img src="/images/{{ $item->image }}" alt="" width="100"></p>
                                @endif
                            </li>   
                        @endforeach
                    </ul>
					
				</div>
			 </div>
		</div>
    </div>

	
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-app-layout>