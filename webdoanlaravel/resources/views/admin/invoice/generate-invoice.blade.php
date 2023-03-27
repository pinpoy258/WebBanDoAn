<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Hóa Đơn #{{ $order->id }}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Web Đồ Ăn Vặt</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Hóa Đơn Id: #{{ $order->id }}</span> <br>
                    <span>Ngày: {{ date('d / m / Y') }}</span> <br>
                    {{-- <span>Zip code : {{ $order->pincode }}</span> <br> --}}
                    <span>Địa Chỉ: {{ $order->diachi }}</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Chi Tiết Hóa Đơn</th>
                <th width="50%" colspan="2">Chi Tiết Khách Hàng</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td>{{ $order->id }}</td>

                <td>Full Name:</td>
                <td>{{ $order->fullname }}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td>{{ $order->tracking_no }}</td>

                <td>Email Id:</td>
                <td>{{ $order->email }}</td>
            </tr>
            <tr>
                <td>Ngày Đặt Hàng:</td>
                <td>{{ $order->created_at->format('d-m-Y h:i A') }}</td>

                <td>Số Điện Thoại:</td>
                <td>{{ $order->phone }}</td>
            </tr>
            <tr>
                <td>Phương Thức Thanh Toán:</td>
                <td>{{ $order->thanhtoan_mode }}</td>

                <td>Địa Chỉ:</td>
                <td>{{ $order->diachi }}</td>
            </tr>
            <tr>
                <td>Trạng Thái Đặt Hàng:</td>
                <td>{{ $order->status_message }}</td>

                {{-- <td>Pin code:</td>
                <td>{{ $order->pincode }}</td> --}}
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
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
                <td width="15%" class="fw-bold">{{ number_format($orderItem->soluong * $orderItem->gia) }}VNĐ</td>
                @php
                    $totalPrice += $orderItem->soluong * $orderItem->gia;
                @endphp
            </tr>
            @endforeach
            <tr>
                <td colspan="4" class="total-heading">Tổng Tiền: - <small>Inc. all vat/tax</small>: </td>
                <td colspan="1" class="total-heading">{{ number_format($totalPrice) }}VNĐ</td>
            </tr>

        </tbody>
    </table>

    <br>
    <p class="text-center">
        Cảm Ơn Bạn Đã Mua Hàng Tại Web Ăn Vặt
    </p>

</body>
</html>