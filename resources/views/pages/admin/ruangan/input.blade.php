<x-app-layout title="Tambah Ruangan">
    <div class="app-content main-content mt-4">
        <div class="side-app">
            <div class="main-container container-fluid">
                <div class="row row-sm">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Data Meja</h4>
                        </div>
                    </div>
                    <form id="form_input"method="post" action="{{ route('admin.food.store') }}">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nomor Meja</label>
                                    <input type="number" name="meja" class="form-control" placeholder="Masukkan Nomor Meja" value="{{ $data->meja }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Gambar</label>
                                    <input type="file" name="cover" class="form-control" placeholder="Masukkan Gambar" value="{{ $data->cover }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Deskripsi</label>
                                    <textarea name="description" class="form-control" placeholder="Masukkan Deskripsi">{{ $data->description }}</textarea>
                                </div>
                            <div class="card-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <a class="btn btn-light" href="{{ url('admin/ruangan') }}">Kembali</a>
                                    @if($data->id)
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.ruangan.update',$data->id)}}','PATCH');" class="btn btn-primary" id="add-btn">Edit Produk</button>
                                    @else
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.ruangan.store')}}','POST');" class="btn btn-primary" id="add-btn">Tambah Produk</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>