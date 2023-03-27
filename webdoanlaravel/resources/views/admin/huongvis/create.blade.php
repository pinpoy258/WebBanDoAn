@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

        <div class="card">
            <div class="card-header">
                <h3>Thêm Hương Vị
                    <a href="{{ url('admin/huongvis') }}" class="btn btn-danger btn-sm text-white float-end">
                        Trở Về
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/huongvis/create') }}" method="POST">
                    @csrf

                <div class="mb-3">
                    <label>Tên Hương Vị</label>
                    <input type="text" name="tenhuongvi" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Hương Vị Code</label>
                    <input type="text" name="code" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Trạng Thái</label> <br/>
                    <input type="checkbox" name="trangthai"  style="width:30px;height:30px" /> Checked=Hidden, UnChecked=Visible
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Lưu Lại</button>
                </div>

                </form>
            </div> 
        </div> 
    </div> 
</div>    

@endsection
