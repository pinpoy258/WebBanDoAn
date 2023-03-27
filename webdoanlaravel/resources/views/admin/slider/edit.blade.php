@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

        <div class="card">
            <div class="card-header">
                <h3>Sửa Slider
                    <a href="{{ url('admin/sliders/') }}" class="btn btn-danger btn-sm text-white float-end">
                        Trở Về
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                <div class="mb-3">
                    <label>Tiêu Đề</label>
                    <input type="text" name="tieude" value="{{ $slider->tieude }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Mô Tả</label>
                    <textarea name="mota" class="form-control" rows="3">{{ $slider->mota }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Hình Ảnh</label>
                    <input type="file" name="hinhanh" class="form-control" />
                    <img src="{{ asset("$slider->hinhanh") }}" style="width:50px; height:50px" alt="Slider"/>
                </div>
                <div class="mb-3">
                    <label>Trạng Thái</label> <br/>
                    <input type="checkbox" name="trangthai" {{ $slider->trangthai == '1' ? 'checked':'' }}  style="width:30px;height:30px" /> 
                    Checked=Hidden, UnChecked=Visible
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                </div>

                </form>
            </div> 
        </div> 
    </div> 
</div>    

@endsection
