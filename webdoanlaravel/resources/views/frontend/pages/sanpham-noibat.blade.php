@extends('layouts.app')

@section('tieude', 'Sản Phẩm Nổi Bật')

@section('content')

<div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <h4>Sản phẩm nổi bật</h4>
            <div class="underline mb-4"></div>
        </div>

            @forelse ($sanphamNoibat as $sanphamItem)
            <div class="col-md-3">
                    <div class="product-card">
                      <div class="product-card-img">
                          <label class="stock bg-danger">Mới</label>

                          @if ($sanphamItem->sanphamHinhanhs->count() > 0)
                          <a href="{{ url('/collections/'.$sanphamItem->loaisp->slug.'/'.$sanphamItem->slug) }}">
                              <img src="{{ asset($sanphamItem->sanphamHinhanhs[0]->hinhanh) }}" alt="{{ $sanphamItem->tensanpham }}">
                          </a>
                          @endif 
                      </div>
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
                    
                      </div>
                    </div>  
                </div>               
                @empty
                    <div class="col-md-12 p-2">
                        <h4>Sản Phẩm Nổi Bật Không Có Sẵn</h4>
                    </div>
                @endforelse

                <div class="text-center">
                    <a href="{{ url('collections') }}" class="btn btn-warning px-3">Xem Thêm</a>
                </div>
       
    </div>
  </div>
</div>

@endsection