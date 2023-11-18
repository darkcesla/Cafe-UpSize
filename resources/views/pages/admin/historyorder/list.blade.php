<div class="card-body">
    <div>
        <div class="table-responsive table-card mb-1">
            <table class="table align-middle">
                <thead class="table-light text-muted">
                    <tr>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengirim</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Kota</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tr>
                </thead>
                <tbody class="list form-check-all">
                    @foreach($order as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$item->user->namalengkap}}</td>
                        <td>{{$item->user->nomorhp}}</td>
                        <td>{{$item->user->address}}</td>
                        <td>{{$item->user->city}}</td>
                        <td>{{$item->payment}}</td>
                        <td>{{$item->status}}</td>
                        <td>
                            <ul class="list-inline hstack gap-2 mb-0">
                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    data-bs-placement="top" title="Show Detail Order" data-bs-original-title="Show Detail Order">
                                    <a href="{{ route('admin.historyorder.show', $item->id) }}"
                                        class="text-primary d-inline-block remove-item-btn">
                                        <i class="ri-eye-fill fs-16"></i>
                                    </a>
                                </li>
                                @if ($item->status == 'pending')
                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                data-bs-placement="top" title="" data-bs-original-title="Accept">
                                     <a href="javascript:;"
                                         onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','PUT','{{route('admin.historyorder.accept',$item->id)}}');"
                                         class="text-success d-inline-block remove-item-btn">
                                         <i class="fa fa-check fs-16"></i>
                                     </a>
                                 </li>
                                 <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                     data-bs-placement="top" title="" data-bs-original-title="Reject">
                                     <a href="javascript:;"
                                         onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','PUT','{{route('admin.historyorder.reject',$item->id)}}');"
                                         class="text-danger d-inline-block remove-item-btn">
                                         <i class="fa fa-close fs-16"></i>
                                     </a>
                                 </li>
                                @endif
                                @if ($item->status =='accepted')
                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                data-bs-placement="top" title="" data-bs-original-title="Finish">
                                    <a href="javascript:;"
                                        onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','PUT','{{route('admin.historyorder.finish',$item->id)}}');"
                                        class="text-success d-inline-block remove-item-btn">
                                        <i class="fa fa-flag fs-16"></i>
                                    </a>
                                </li>
                                @endif                              
                                @if ($item->status != 'deleted')
                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    data-bs-placement="top" title="" data-bs-original-title="Remove">
                                    <a href="javascript:;"
                                        onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','DELETE','{{route('admin.historyorder.destroy',$item->id)}}');"
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
    {{ $order->links('theme.app.pagination') }}
</div>