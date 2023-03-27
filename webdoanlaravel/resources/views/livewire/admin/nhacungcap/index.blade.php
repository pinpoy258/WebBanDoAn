<div>
    
    @include('Livewire.admin.nhacungcap.modal-form')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Nhacungcaps List
                        <a href="#" data-bs-toggle="modal" data-bs-target="#themNhacungcapModal" class="btn btn-primary btn-sm float-end">Thêm Nhà Cung Cấp</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Tên Nhà Cung Cấp</th>
                                <th>Loại Sản Phẩm</th>
                                <th>Không Dấu</th>
                                <th>Trạng Thái</th>
                                <th>Hoạt Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($nhacungcaps as $nhacungcap)
                            <tr>
                                <td>{{ $nhacungcap->id }}</td>
                                <td>{{ $nhacungcap->tennhacungcap }}</td>
                                <td>
                                    @if ($nhacungcap->loaisp)
                                        {{ $nhacungcap->loaisp->tenloai }}
                                    @else
                                        Không Loaisp
                                    @endif
                                </td>
                                <td>{{ $nhacungcap->slug }}</td>
                                <td>{{ $nhacungcap->trangthai == '1' ? 'hidden':'visible' }}</td>
                                <td>
                                    <a href="#" wire:click="editNhacungcap({{$nhacungcap->id}})" data-bs-toggle="modal" data-bs-target="#capnhatNhacungcapModal" class="btn btn-sm btn-success">Sửa</a>
                                    <a href="" wire:click="xoaNhacungcap({{$nhacungcap->id}})" data-bs-toggle="modal" data-bs-target="#xoaNhacungcapModal" class="btn btn-sm btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">Không Tìm Thấy Nhà Cung Cấp</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $nhacungcaps->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('script')

<script>
    window.addEventListemer('close-modal', event=>{

        $('#themNhacungcapModal').modal('hide');
        $('#capnhatNhacungcapModal').modal('hide');
        $('#xoaNhacungcapModal').modal('hide');
    });
</script>

@endpush
