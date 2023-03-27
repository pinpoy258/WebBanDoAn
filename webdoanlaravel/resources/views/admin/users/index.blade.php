@extends('layouts.admin')

@section('title','Users List')

@section('content')

<div class="row">
    <div class="col-md-12">

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

        <div class="card">
            <div class="card-header">
                <h3>Users
                    <a href="{{ url('admin/users/create') }}" class="btn btn-primary btn-sm text-white float-end">
                        Thêm User
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Tên User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Hoạt Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->role_as == '0')
                                    <label class="badge btn-primary">User</label>
                                @elseif ($user->role_as == '1')
                                    <label class="badge btn-success">Admin</label>
                                @else
                                    <label class="badge btn-danger">none</label>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-sm btn-success">
                                    Sửa
                                </a>
                                <a href="{{ url('admin/users/'.$user->id.'/delete') }}" 
                                    onclick="return confirm('Bạn có chắc, bạn muốn xóa dữ liệu này?')" 
                                    class="btn btn-sm btn-danger">
                                    Xóa
                                </a>
                            </td>
            
                        </tr>
                        @empty
                        <tr>
                            <td colspan = "5">Users Không Có Sẵn </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $users->links()}}
                </div>
            </div> 
        </div> 
    </div> 
</div> 

@endsection
