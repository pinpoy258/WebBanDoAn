@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

        <div class="card">
            <div class="card-header">
                <h3>Sản Phẩm
                    <a href="{{ url('admin/sanphams/create') }}" class="btn btn-primary btn-sm text-white float-end">
                        Thêm Sản Phẩm
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Loại Sản Phẩm</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Gía</th>
                            <th>Số Lượng</th>
                            <th>Trạng Thái</th>
                            <th>Hoạt Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sanphams as $sanpham)
                        <tr>
                            <td>{{ $sanpham->id }}</td>
                            <td>
                                @if($sanpham->loaisp)
                                    {{ $sanpham->loaisp->tenloai }}
                                @else
                                    Không tìm thấy Loại Sản Phẩm
                                @endif
                            </td>
                            <td>{{ $sanpham->tensanpham }}</td>
                            <td>{{ number_format($sanpham->selling_gia) }}</td>
                            <td>{{ $sanpham->soluong }}</td>
                            <td>{{ $sanpham->trangthai == '1' ? 'Hidden':'Visible' }}</td>
                            <td>
                                <a href="{{ url('admin/sanphams/'.$sanpham->id.'/edit') }}" class="btn btn-sm btn-success">Sửa</a>
                                <a href="{{ url('admin/sanphams/'.$sanpham->id.'/delete') }}" onclick="return confirm('Bạn có chắc, bạn muốn xóa dữ liệu này?')" class="btn btn-sm btn-danger">
                                    Xóa
                                </a>
                            </td>
                            
                            
                        </tr>
                        @empty
                        <tr>
                            <td colspan = "7">Sản Phẩm Không Có Sẵn </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $sanphams->links()}}
                </div>
            </div> 
        </div> 
    </div> 
</div>    

@endsection
