@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

        <div class="card">
            <div class="card-header">
                <h3>Danh Sách Hương Vị
                    <a href="{{ url('admin/huongvis/create') }}" class="btn btn-primary btn-sm text-white float-end">
                        Thêm Hương Vị
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Tên Hương Vị</th>
                            <th>Hương Vị Code</th>
                            <th>Trạng Thái</th>
                            <th>Hoạt Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($huongvis as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->tenhuongvi }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->trangthai ? 'Hidden': 'Visible' }}</td>
                            <td>
                                <a href="{{ url('admin/huongvis/'.$item->id.'/edit') }}" class="btn btn-success btn-sm">Sửa</a>
                                <a href="{{ url('admin/huongvis/'.$item->id.'/delete') }}" onclick="return confirm('Bạn Có Chắc Muốn Xóa ?')" class="btn btn-danger btn-sm">Xóa</a>
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
