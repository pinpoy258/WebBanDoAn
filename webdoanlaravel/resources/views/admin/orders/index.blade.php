@extends('layouts.admin')

@section('tieude', 'Đơn Hàng Của Tôi')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Đơn Hàng Của Tôi</h3>
            </div>
            <div class="card-body">

                <form action="" method="GET">

                    <div class="row">
                        <div class="col-md-3">
                            <label>Lọc Theo Ngày</label>
                            <input type="date" name="date"  value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Lọc Theo Trạng Thái</label>
                            <select name="status" class="form-select">
                                <option value="">Chọn Trạng Thái</option>
                                <option value="trong tiến trình" {{ Request::get('status') == 'trong tiến trình' ? 'selected':'' }}>Trong Tiến Trình</option>
                                <option value="đã thanh toán" {{ Request::get('status') == 'đã thanh toán' ? 'selected':'' }}>Đã Thanh Toán</option>
                                <option value="chưa thanh toán" {{ Request::get('status') == 'chưa thanh toán' ? 'selected':'' }}>Chưa Thanh Toán</option>
                                <option value="đã hủy" {{ Request::get('status') == 'đã hủy' ? 'selected':'' }}>Đã Hủy</option>
                                <option value="đang giao hàng" {{ Request::get('status') == 'đang giao hàng' ? 'selected':'' }}>Đang Giao Hàng</option>
                            </select> 
                        </div>
                        <div class="col-md-6">
                            <br/>
                            <button type="submit" class="btn btn-primary">Lọc</button>
                        </div>
                    </div>

                </form>
                <hr>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Tracking No</th>
                                        <th>Username</th>
                                        <th>Phương Thức Thanh Toán</th>
                                        <th>Ngày Đặt Hàng</th>
                                        <th>Thông Báo Trạng Thái</th>
                                        <th>Hoạt Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->tracking_no }}</td>
                                            <td>{{ $item->fullname }}</td>
                                            <td>{{ $item->thanhtoan_mode }}</td>
                                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $item->status_message }}</td>
                                            <td><a href="{{ url('admin/orders/'.$item->id) }}" class="btn btn-primary btn-sm">Xem Chi Tiết</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">Đơn Hàng Không Có Sẵn</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div>
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                     
@endsection




