@extends('layouts.admin')

@section('content')

<div class="row">
      <div class="col-md-12 grid-margin">

            @if(session('message'))
              <h6 class='alert alert-success'>{{ session('message') }},</h6>
            @endif
            <div class="me-md-3 me-xl-5">
              <h2>DashBoard</h2>
              <p class="mb-md-0">Mẫu bảng điều khiển phân tích của bạn</p>
              <hr>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label>Tổng số đơn dặt hàng </label>
                        <h1>{{ $tongOrder }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">Xem</a>
                    </div>
                </div>

                <div class="col-md-3">
                  <div class="card card-body bg-success text-white mb-3">
                      <label>Đơn dặt hàng hôm nay </label>
                      <h1>{{ $todayOrder }}</h1>
                      <a href="{{ url('admin/orders') }}" class="text-white">Xem</a>
                  </div>
              </div>

              <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <label>Đơn dặt hàng tháng này </label>
                    <h1>{{ $thisMonthOrder }}</h1>
                    <a href="{{ url('admin/orders') }}" class="text-white">Xem</a>
                </div>
            </div>

            <div class="col-md-3">
              <div class="card card-body bg-danger text-white mb-3">
                  <label>Đơn dặt hàng năm nay </label>
                  <h1>{{ $thisYearOrder }}</h1>
                  <a href="{{ url('admin/orders') }}" class="text-white">Xem</a>
              </div>
          </div>

    <hr>
    <div class="row">
            <div class="col-md-3">
              <div class="card card-body bg-primary text-white mb-3">
                  <label>Tổng sản phẩm</label>
                  <h1>{{ $tongSanphams }}</h1>
                  <a href="{{ url('admin/sanphams') }}" class="text-white">Xem</a>
              </div>
          </div>

          <div class="col-md-3">
            <div class="card card-body bg-success text-white mb-3">
                <label>Tổng loại sản phẩm </label>
                <h1>{{ $tongLoaisps }}</h1>
                <a href="{{ url('admin/loaisps') }}" class="text-white">Xem</a>
            </div>
          </div>

        <div class="col-md-3">
            <div class="card card-body bg-warning text-white mb-3">
              <label>Tổng nhà cung cấp </label>
              <h1>{{ $tongNhacungcap }}</h1>
              <a href="{{ url('admin/nhacungcaps') }}" class="text-white">Xem</a>
          </div>
        </div>
    </div>

    <hr>
    <div class="row">
            <div class="col-md-3">
              <div class="card card-body bg-primary text-white mb-3">
                  <label>Tất cả tài khoản</label>
                  <h1>{{ $tongAllUsers }}</h1>
                  <a href="{{ url('admin/users') }}" class="text-white">Xem</a>
              </div>
          </div>

          <div class="col-md-3">
            <div class="card card-body bg-success text-white mb-3">
                <label>Tổng Users</label>
                <h1>{{ $tongUser }}</h1>
                <a href="{{ url('admin/users') }}" class="text-white">Xem</a>
            </div>
          </div>

        <div class="col-md-3">
            <div class="card card-body bg-warning text-white mb-3">
              <label>Tổng Admin</label>
              <h1>{{ $tongAdmin }}</h1>
              <a href="{{ url('admin/users') }}" class="text-white">Xem</a>
          </div>
        </div>
    </div>



            </div>

      </div>
</div>

@endsection