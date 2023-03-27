@extends('layouts.app')

@section('tieude', 'User Profile')

@section('content')

<div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4>User Profile
                        <a href="{{ url('change-password') }}" class="btn btn-warning float-end">Thay đổi mật khẩu</a>
                    </h4>
                    <div class="underline mb-4"></div>
                </div>

                <div class="col-md-10">

                    @if (session('message'))
                        <p class="alert alert-success">{{ session('message') }}</p>
                    @endif

                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                        
                    @endif

                    <div class="card shadow">
                        <div class="card-header bg-primary">
                            <h4 class="mb-0 text-white">Chi tiết User</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('profile') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Username</label>
                                            <input type="text" name="username" value="{{ Auth::user()->name }}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Địa chỉ Email</label>
                                            <input type="text" readonly value="{{ Auth::user()->email }}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Số Điện Thoại</label>
                                            <input type="text" name="phone" value="{{ Auth::user()->userDetail->phone ?? '' }}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label>Địa chỉ</label>
                                            <textarea name="diachi" class="form-control" rows="3">{{ Auth::user()->userDetail->diachi ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Lưu Dữ Liệu</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection