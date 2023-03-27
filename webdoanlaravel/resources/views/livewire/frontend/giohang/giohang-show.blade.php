<div>
    <div class="py-3 py-md-5">
        <div class="container">
            <h4>Giỏ Hàng Của Tôi</h4>
            <hr>
    
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Các Sản Phẩm</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Giá</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Số Lượng</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Tổng Giá</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Xóa</h4>
                                </div>
                            </div>
                        </div>

                        @forelse ($giohang as $giohangItem)
                            @if ($giohangItem->sanpham)
                            <div class="cart-item">
                                <div class="row">
                                 <div class="col-md-6 my-auto">
                                     <a href="{{ url('collections/'.$giohangItem->sanpham->loaisp->slug.'/'.$giohangItem->sanpham->slug) }}">
                                         <label class="product-name">
                                             
                                            @if ($giohangItem->sanpham->sanphamHinhanhs)
                                                <img src="{{ asset($giohangItem->sanpham->sanphamHinhanhs[0]->hinhanh) }}" 
                                                style="width: 50px; height: 50px" alt="">
                                            @else
                                                <img src="" style="width: 50px; height: 50px" alt="">
                                            @endif
                                          

                                             {{ $giohangItem->sanpham->tensanpham }}
                                             
                                             @if ($giohangItem->sanphamHuongVi && $giohangItem->sanphamKichthuoc)
                                                @if ($giohangItem->sanphamHuongVi->huongvi && $giohangItem->sanphamKichthuoc->kichthuoc )
                                                <span>- Hương vị: {{ $giohangItem->sanphamHuongVi->huongvi->tenhuongvi }}</span>
                                                <span>- Size: {{ $giohangItem->sanphamKichthuoc->kichthuoc->tenkichthuoc }}</span>
                                                @endif
                                             @endif
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-1 my-auto">
                                        <label class="price">{{ number_format($giohangItem->sanpham->selling_gia) }}VNĐ </label>
                                    </div>
                                    <div class="col-md-2 col-7 my-auto">
                                        <div class="quantity">
                                            <div class="input-group">
                                                <button type="button" wire:loading.attr="disabled" wire:click="decrementSoluong({{ $giohangItem->id }})" class="btn btn1"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="{{ $giohangItem->soluong }}" class="input-quantity" />
                                                <button type="button" wire:loading.attr="disabled" wire:click="incrementSoluong({{ $giohangItem->id }})"  class="btn btn1"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                     </div>
                                     <div class="col-md-1 my-auto">
                                        <label class="price">{{ number_format($giohangItem->sanpham->selling_gia * $giohangItem->soluong) }}VNĐ </label>
                                        @php $tongGia += $giohangItem->sanpham->selling_gia * $giohangItem->soluong  @endphp
                                    </div>
                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <button type="button" wire:loading.attr="disabled" wire:click="removeGiohangItem({{ $giohangItem->id }})" class="btn btn-danger btn-sm">
                                                <span wire:loading.remove wire:target="removeGiohangItem({{ $giohangItem->id }})" >
                                                    <i class="fa fa-trash"></i> Xóa
                                                </span>
                                                <span wire:loading wire:target="removeGiohangItem({{ $giohangItem->id }})" >
                                                    <i class="fa fa-trash"></i> Đang Xóa
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                            @endif
                        @empty
                            <div>Sản Phẩm Giỏ Hàng Không Có Sẵn</div>
                        @endforelse
                         
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 my-md-auto mt-3">
                    <h5>
                        Nhận ưu đãi tốt nhất <a href="{{ url('/collections') }}">Mua Ngay</a>
                    </h5>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-white p-3">
                        <h4>Tổng: 
                            <span class="float-end">{{ number_format($tongGia) }}VNĐ</span>
                        </h4>
                        <hr>
                        <a href="{{ url('/thanhtoan') }}" class="btn btn-warning w-100">Thanh Toán</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
