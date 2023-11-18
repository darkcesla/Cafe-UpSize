<div class="card-body">
    <div>
        <div class="table-responsive table-card mb-1">
            <table class="table align-middle">
                <thead class="table-light text-muted">
                    <tr>
                        <th>No</th>
                        <th>Nama Pengirim</th>
                        <th>No Meja</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="list form-check-all">
                    @foreach($booking as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$item->user->namalengkap}}</td>
                        <td>{{$item->meja->meja}}</td>
                        <td>{{$item->book_date}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->status}}</td>
                        <td>
                            <ul class="list-inline hstack gap-2 mb-0">
                               @if ($item->status == 'Pending')
                               <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                               data-bs-placement="top" title="" data-bs-original-title="Accept">
                                    <a href="javascript:;"
                                        onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','PUT','{{route('admin.history.accept',$item->id)}}');"
                                        class="text-success d-inline-block remove-item-btn">
                                        <i class="fa fa-check fs-16"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    data-bs-placement="top" title="" data-bs-original-title="Reject">
                                    <a href="javascript:;"
                                        onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','PUT','{{route('admin.history.reject',$item->id)}}');"
                                        class="text-danger d-inline-block remove-item-btn">
                                        <i class="fa fa-close fs-16"></i>
                                    </a>
                                </li>
                               @endif
                               @if ($item->status =='Accept')
                               <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                               data-bs-placement="top" title="" data-bs-original-title="Finish">
                                   <a href="javascript:;"
                                       onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','PUT','{{route('admin.history.finish',$item->id)}}');"
                                       class="text-success d-inline-block remove-item-btn">
                                       <i class="fa fa-flag fs-16"></i>
                                   </a>
                               </li>
                               @endif
                                @if ($item->status != 'Pending')
                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    data-bs-placement="top" title="" data-bs-original-title="Remove">
                                    <a href="javascript:;"
                                        onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','DELETE','{{route('admin.history.destroy',$item->id)}}');"
                                        class="text-danger d-inline-block remove-item-btn">
                                        <i class="ri-delete-bin-5-fill fs-16"></i>
                                    </a>
                                </li>
                                @endif
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
    {{ $booking->links('theme.app.pagination') }}
</div>
