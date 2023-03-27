@extends('layouts.app')

@section('tieude', 'Trang Chủ')

@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

  <div class="carousel-inner">

    @foreach($sliders as $key => $sliderItem)
    <div class="carousel-item {{ $key == 0 ? 'active':'' }}">
        @if($sliderItem->hinhanh)
        <img src="{{ asset("$sliderItem->hinhanh") }}" style="height:650px" class="d-block w-100" alt="...">
        @endif
   
        <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>
                            {!! $sliderItem->tieude !!}
                        </h1>
                        <p>
                            {!! $sliderItem->mota !!}
                        </p>
                        <div>
                            <a href="#" class="btn btn-slider">
                                Get Now
                            </a>
                        </div>
                    </div>
                </div>
    </div>
    @endforeach
    
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

        <div class="py-5 bg-white">
          <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                  <h4>Chào mừng đến với Web ăn vặt 24h</h4>
                  <div class="underline mx-auto"></div>
                  <p>
                      Web ăn vặt 24h là web bán các món ăn vặt ngon, tiện lợi cho mọi người làm việc văn phòng.
                      Không có thời gian để ra ngoài mua những món ăn vặt mà mình yêu thích. Thì hãy đến với web ăn vặt 
                      24h để trải nghiệm và đặt hàng, khi đặt hàng món ăn sẽ đưuọc giao đến tận nơi trong khu vực Tp.HCM.
                  </p>
                </div>
              </div>
          </div>
        </div>

        <div class="py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                  <h4>Sản phẩm bán chạy</h4>
                  <div class="underline mb-4"></div>
              </div>

              @if($trendingSanphams)
                <div class="col-md-12">
                  <div class="owl-carousel owl-theme four-carousel">
                      @foreach ($trendingSanphams as $sanphamItem)
                          <div class="item">

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
                      @endforeach
                  </div>
              </div>
              @else
              <div class="col-md-12">
                <div class="p-2">
                    <h4>Sản Phẩm Không Có Sẵn</h4>
                </div>
            </div>
            @endif
          </div>
        </div>
      </div>


      <div class="py-5 bg-white">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                <h4>Sản phẩm mới
                  <a href="{{ url('sanpham-moi') }}" class="btn btn-warning float-end">Xem Thêm</a>
                </h4>
                <div class="underline mb-4"></div>
            </div>

            @if($sanphamMoisSanphams)
              <div class="col-md-12">
                <div class="owl-carousel owl-theme four-carousel">
                    @foreach ($sanphamMoisSanphams as $sanphamItem)
                      <div class="item">
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
                    @endforeach
                </div>
            </div>
            @else
            <div class="col-md-12">
              <div class="p-2">
                  <h4>Sản Phẩm Mới Không Có Sẵn</h4>
              </div>
          </div>
          @endif
        </div>
      </div>
    </div>


    <div class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <h4>Sản nổi bật
                  <a href="{{ url('sanpham-noibat') }}" class="btn btn-warning float-end">Xem Thêm</a>
              </h4>
              <div class="underline mb-4"></div>
          </div>

          @if($sanphamNoibat)
            <div class="col-md-12">
              <div class="owl-carousel owl-theme four-carousel">
                  @foreach ($sanphamNoibat as $sanphamItem)
                    <div class="item">
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
                  @endforeach
              </div>
          </div>
          @else
          <div class="col-md-12">
            <div class="p-2">
                <h4>Sản Phẩm Nổi Bật Không Có Sẵn</h4>
            </div>
        </div>
        @endif
      </div>
    </div>
  </div>
                

@endsection

@section('script')

<script>
 $('.four-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>

@endsection
