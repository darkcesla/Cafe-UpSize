<div class="card-body">
    <div>
        <div class="table-responsive table-card mb-1">
            <table class="table align-middle">
                <thead class="table-light text-muted">
                    <tr>
                        <th>No</th>
                        <th>Nama Pengirim</th>
                        <th>Isi Kritik & Saran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="list form-check-all">
                    @foreach($kritik as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$item->namalengkap}}</td>
                        <td>{{$item->kritiksaran}}</td>
                        <td>
                            <ul class="list-inline hstack gap-2 mb-0">
                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    data-bs-placement="top" title="" data-bs-original-title="Remove">
                                    <a href="javascript:;"
                                        onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','DELETE','{{route('admin.kritik.destroy',$item->id)}}');"
                                        class="text-danger d-inline-block remove-item-btn">
                                        <i class="ri-delete-bin-5-fill fs-16"></i>
                                    </a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    {{ $kritik->links('theme.app.pagination') }}
</div>
