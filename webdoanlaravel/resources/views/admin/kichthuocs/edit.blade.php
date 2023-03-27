@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

        <div class="card">
            <div class="card-header">
                <h3>Sửa Kích Thước
                    <a href="{{ url('admin/kichthuocs') }}" class="btn btn-danger btn-sm text-white float-end">
                        Trở Về
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/kichthuocs/'.$kichthuoc->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                <div class="mb-3">
                    <label>Tên Kích Thước</label>
                    <input type="text" name="tenkichthuoc" value="{{ $kichthuoc->tenkichthuoc }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Mã Kích Thước</label>
                    <input type="text" name="makichthuoc" value="{{ $kichthuoc->makichthuoc }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Trạng Thái</label> <br/>
                    <input type="checkbox" name="trangthai" {{ $kichthuoc->trangthai ? 'checked': '' }}" style="width:30px;height:30px" /> Checked=Hidden, UnChecked=Visible
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
