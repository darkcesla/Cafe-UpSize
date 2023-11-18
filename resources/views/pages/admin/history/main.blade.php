<x-app-layout title="HistoryMeja">
    <div id="content_list">
        <div class="app-content main-content mt-4">
            <div class="side-app">
                <div class="main-container container-fluid"> 
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                                    <h3 class="card-title">History Ruangan</h3>
                                    <div class="ms-auto pageheader-btn">
                                        <a href="{{ route('admin.history.export.pdf') }}" class="btn btn-primary">Ekspor PDF</a>
                                    </div>
                                </div>
                                <div class="ms-auto pageheader-btn"></div>
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