@extends('layouts.app')

@section('tieude', 'Tìm Kiếm Sản Phẩm')

@section('content')

<div class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
            <h4>Kết quả tìm kiếm</h4>
            <div class="underline mb-4"></div>
        </div>

            @forelse ($searchSanphams as $sanphamItem)
            <div class="col-md-10">

                <div class="product-card">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="product-card-img">
                                <label class="stock bg-danger">Mới</label>
                                @if ($sanphamItem->sanphamHinhanhs->count() > 0)
                                <a href="{{ url('/collections/'.$sanphamItem->loaisp->slug.'/'.$sanphamItem->slug) }}">
                                    <img src="{{ asset($sanphamItem->sanphamHinhanhs[0]->hinhanh) }}" alt="{{ $sanphamItem->tensanpham }}">
                                </a>
                                @endif 
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="product-card-body">
                                <p class="product-brand">{{ $sanphamItem->nhacungcap }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('/collections/'.$sanphamItem->loaisp->slug.'/'.$sanphamItem->slug) }}">
                                        {{ $sanphamItem->tensanpham }}
                                    </a>
                                </h5>
  
                                <div>
                                    <span class="selling-price">{{number_format($sanphamItem->selling_gia)}} VNĐ</span>
                                    <span class="original-price">{{number_format($sanphamItem->original_gia)}} VNĐ</span>
                                </div>
                                    <p style="height: 45px; overflow: hidden">
                                    <b>Mô tả:</b>    {{ $sanphamItem->mota }}
                                    </p>
                                    <a href="{{ url('/collections/'.$sanphamItem->loaisp->slug.'/'.$sanphamItem->slug) }}" 
                                    class="btn btn-outline-primary">
                                    Xem
                                    </a>
                                </div>
                            </div>
                    </div>
                </div>    
            </div>                       
            @empty
            <div class="col-md-12 p-2">
                <h4>Không Tìm Thấy Sản Phẩm</h4>
            </div>
            @endforelse

            <div class="col-md-10">
                {{ $searchSanphams->appends(request()->input())->links() }}
            </div>
           
    </div>
  </div>
</div>

@endsection