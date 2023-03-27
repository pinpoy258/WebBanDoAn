@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

        <div class="card">
            <div class="card-header">
                <h3>Danh Sách Slider
                    <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm text-white float-end">
                        Thêm Slider
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Tiêu Đề</th>
                            <th>Mô Tả</th>
                            <th>Hình Ảnh</th>
                            <th>Trạng Thái</th>
                            <th>Hoạt Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td>{{ $slider->tieude }}</td>
                                <td>{{ $slider->mota }}</td>
                                <td>
                                    <img src=" {{ asset("$slider->hinhanh") }}" style="width: 70px; height: 70px;" alt="Slider">
                                </td>
                                <td>{{ $slider->trangthai == '0' ? 'Visible':'Hidden' }}</td>
                                <td>
                                    <a href="{{ url('admin/sliders/'.$slider->id.'/edit' ) }}" class="btn btn-success">Sửa</a>
                                    <a href="{{ url('admin/sliders/'.$slider->id.'/delete') }}" 
                                    onclick ="return confirm('Bạn có chắc muốn xóa slider này');"
                                    class="btn btn-danger"
                                >
                                    Xóa
                                </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> 
        </div> 
    </div> 
</div>    

@endsection
