<x-app-layout title="Ruangan">
    <div id="content_list">
        <div class="app-content main-content mt-4">
            <div class="side-app">
                <div class="main-container container-fluid">    
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                       <div class="row g-4">
                                            <div class="col-sm-auto d-flex justify-content-between">
                                                <h3 class="card-title">Data Meja</h3>
                                            </div>
                                       </div>
                                       <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="me-3">
                                                <form id="content_filter">
                                                    <input type="text" name="keyword" onkeyup="load_list(1);"
                                                        class="form-control" placeholder="Cari Meja...">     
                                                </form>                     
                                            </div>
                                            <a class="btn btn-info add-btn" href="{{route('admin.ruangan.create')}}"
                                            {{-- onclick="load_input('{{route('admin.food.create')}}');"><i --}}
                                                class="ri-add-line align-bottom me-1"></i>Tambah Data</a>
                                            </div>
                                        </div>
                                    </div>
                                <div class="ms-auto pageheader-btn">
                                </div>
                                <div id="list_result"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="content_input"></div>
    <div id="content_detail"></div>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-app-layout>
