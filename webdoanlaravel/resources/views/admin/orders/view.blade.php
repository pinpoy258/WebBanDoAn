@extends('layouts.admin')

@section('tieude', 'Chi Tiết Đơn Hàng Của Tôi')

@section('content')

<div class="row">
    <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success mb-3">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Chi Tiết Đơn Hàng Của Tôi</h3>
            </div>
            <div class="card-body">

                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart text-dark"></i> Chi Tiết Đơn Hàng Của Tôi
                            <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-sm float-end mx-1">Trở Về</a>
                            <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-primary btn-sm float-end mx-1">
                                Tải Hóa Đơn
                            </a>
                            <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-warning btn-sm float-end mx-1">
                                Xem Hóa Đơn
                            </a>
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Chi Tiết Đơn Hàng</h5>
                                <hr>
                                <h6>Order Id: {{ $order->id }}</h6>
                                <h6>Tracking ID/No: {{ $order->tracking_no }}</h6>
                                <h6>Ngày Đặt Hàng: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                                <h6>Phương Thức Thanh Toán: {{ $order->thanhtoan_mode }}</h6>
                                <h6 class="border p-2 text-success">
                                    Thông Báo Trạng Thái Đơn Hàng: <span class="text-uppercase">{{ $order->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>Chi Tiết Khách Hàng</h5>
                                <hr>
                                <h6>Full Name: {{ $order->fullname }}</h6>
                                <h6>Email Id: {{ $order->email }}</h6>
                                <h6>Số Điện Thoại: {{ $order->phone }}</h6>
                                <h6>Địa Chỉ: {{ $order->diachi }}</h6>
                                {{-- <h6>Pin code: {{ $order->pincode }}</h6> --}}
                            </div>
                        </div>

                        <br />
                        <h5>Order Items</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Hình Ảnh</th>
                                        <th>Sản Phẩm</th>
                                        <th>Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Tổng Cộng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        <td width="10%">{{ $orderItem->id }}</td>
                                        <td width="10%">
                                            @if ($orderItem->sanpham->sanphamHinhanhs)
                                                <img src="{{ asset($orderItem->sanpham->sanphamHinhanhs[0]->hinhanh) }}" 
                                                style="width: 50px; height: 50px" alt="">
                                            @else
                                                <img src="" style="width: 50px; height: 50px" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            {{ $orderItem->sanpham->tensanpham }}
                                            @if ($orderItem->sanphamHuongVi && $orderItem->sanphamKichthuoc)
                                                @if ($orderItem->sanphamHuongVi->huongvi && $orderItem->sanphamKichthuoc->kichthuoc )
                                                <span>- Hương vị: {{ $orderItem->sanphamHuongVi->huongvi->tenhuongvi }}</span>
                                                <span>- Size: {{ $orderItem->sanphamKichthuoc->kichthuoc->tenkichthuoc }}</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td width="10%">{{ number_format($orderItem->gia) }}VNĐ</td>
                                        <td width="10%">{{ $orderItem->soluong }}</td>
                                        <td width="10%" class="fw-bold">{{ number_format($orderItem->soluong * $orderItem->gia) }}VNĐ</td>
                                        @php
                                            $totalPrice += $orderItem->soluong * $orderItem->gia;
                                        @endphp
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="fw-bold">Tổng Tiền: </td>
                                        <td colspan="1" class="fw-bold">{{ number_format($totalPrice) }}VNĐ</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                </div>
            </div>
        </div>

        <div class="card border mt-3">
            <div class="card-body">
                <h4>Tiến Trình Đặt Hàng (Cập Nhật Trạng Thái Đặt Hàng) </h4>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <label>Cập Nhật Trạng Thái Đặt Hàng</label>
                            <div class="input-group">
                                <select name="order_status" class="form-select">
                                    <option value="">Chọn Trạng Thái Đặt Hàng</option>
                                    <option value="trong tiến trình" {{ Request::get('status') == 'trong tiến trình' ? 'selected':'' }}>Trong Tiến Trình</option>
                                    <option value="đã duyệt" {{ Request::get('status') == 'đã duyệt' ? 'selected':'' }}>Đã Duyệt</option>
                                    <option value="không xử lý" {{ Request::get('status') == 'không xử lý' ? 'selected':'' }}>Không xử lý</option>
                                    <option value="đã hủy" {{ Request::get('status') == 'đã hủy' ? 'selected':'' }}>Đã Hủy</option>
                                    <option value="đang giao hàng" {{ Request::get('status') == 'đang giao hàng' ? 'selected':'' }}>Đang Giao Hàng</option>
                                </select> 
                                <button type="submit" class="btn btn-primary text-white">Cập Nhật</button>
                            </div>
                            
                        </form>
                    </div>
                    <div class="col-md-7">
                        <br/>
                        <h4 class="mt-3">Trạng Thái Đặt Hàng Hiện Tại: <span class="text-uppercase">{{ $order->status_message }}</span> </h4>
                    </div>
                </div>
            </div>
        </div>

     </div>
</div>
                     
@endsection    