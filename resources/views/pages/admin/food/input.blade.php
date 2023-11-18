<x-app-layout title="Tambah Produk">
    <div class="app-content main-content mt-4">
        <div class="side-app">
            <div class="main-container container-fluid">  
                <div class="row row-sm">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Menu</h4>
                        </div>
                    </div>
                    <form id="form_input" method="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama Produk</label>
                                    <input type="text" name="title" class="form-control" placeholder="Masukkan Nama Product" value="{{ $data->title }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Pilih Kategori</label>
                                    <select name="category" class="form-select">
                                        <option disabled selected>Pilih Kategori</option>
                                        <option value="Makanan">Makanan</option>
                                        <option value="Minuman">Minuman</option>
                                    </select>
                                    <br>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Harga</label>
                                    <input type="number" name="price" class="form-control" placeholder="Masukkan Harga" value="{{ $data->price }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Stok</label>
                                    <input type="number" name="stock" class="form-control" placeholder="Masukkan Stok" value="{{ $data->stock }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Gambar</label>
                                    <input type="file" name="cover" class="form-control" placeholder="Masukkan Gambar" value="{{ $data->cover }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Deskripsi</label>
                                    <textarea name="description" class="form-control" placeholder="Masukkan Deskripsi">{{ $data->description }}</textarea>
                                </div>
                            </div>
                            <div class="card-footer"> 
                                <div class="hstack gap-2 justify-content-end">
                                    <a class="btn btn-light" href="{{ url('admin/food') }}">Kembali</a>
                                    @if($data->id)
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.food.update',$data->id)}}','PATCH');" class="btn btn-primary" id="add-btn">Edit Produk</button>
                                    @else   
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.food.store')}}','POST');" class="btn btn-primary" id="add-btn">Tambah Produk</button>
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
