@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Sửa Loại Sản Phẩm
                    <a href="{{ url('admin/loaisp') }}" class="btn btn-danger btn-sm text-white float-end">Trở Về</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/loaisp/'.$loaisp->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                <div class="row">

                    
                    <div class="col-md-6 mb-3">
                        <label>Tên Loại</label>
                        <input type="text" name="tenloai" value="{{ $loaisp->tenloai }}" class="form-control"/>
                        @error('tenloai') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Không bỏ dấu</label>
                        <input type="text" name="slug" value="{{ $loaisp->slug }}" class="form-control"/>
                        @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Mô Tả</label>
                        <textarea name="mota" class="form-control" rows="3">{{ $loaisp->mota }}</textarea>
                        @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Hình Ảnh</label>
                        <input type="file" name="hinhanh" class="form-control"/>
                        <img src="{{ asset('/uploads/loaisp/'.$loaisp->hinhanh) }}" width="60px" height="60px" />
                        @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Trạng Thái</label><br/>
                        <input type="checkbox" name="trangthai" {{ $loaisp->trangthai == '1' ? 'checked':'' }} />
                        @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    
                    <div class="col-md-12">
                        <h4>SEO Tags</h4>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Tiêu Đề Meta</label>
                        <input type="text" name="meta_tieude" value="{{ $loaisp->meta_tieude }}" class="form-control"/>
                        @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>MeTa KeyWord</label>
                        <textarea name="meta_keyword" class="form-control" rows="3">{{ $loaisp->meta_keyword }}</textarea>
                        @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Meta Mô Tả</label>
                        <textarea name="meta_mota" class="form-control" rows="3">{{ $loaisp->meta_mota }}</textarea>
                        @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                       <button type="submit" class="btn btn-primary float-end">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection