<div>
<div class="py-3 py-md-5">
        <div class="container">

            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border" wire:ignore>
                        @if($sanpham->sanphamHinhanhs)
                        {{-- <img src="{{ asset($sanpham->sanphamHinhanhs[0]->hinhanh) }}" class="w-100" alt="Img"> --}}
                        <div class="exzoom" id="exzoom">

                            <div class="exzoom_img_box">
                              <ul class='exzoom_img_ul'>
                                @foreach ($sanpham->sanphamHinhanhs as $itemHinhanh)
                                    <li><img src="{{ asset($itemHinhanh->hinhanh) }}"/></li>
                                @endforeach  
                              </ul>
                            </div>

                            <div class="exzoom_nav"></div>
                            <!-- Nav Buttons -->
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                            </p>
                          </div>
                        @else
                            Không hình ảnh được thêm
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $sanpham->tensanpham }}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $sanpham->loaisp->tenloai }} / {{ $sanpham->tensanpham }}
                        </p>
                        <div>
                            <span class="selling-price">{{ number_format($sanpham->selling_gia) }}VNĐ</span>
                            <span class="original-price">{{ number_format($sanpham->original_gia) }}VNĐ</span>
                        </div>

                        <div>
                            @if($sanpham->sanphamHuongVis->count() > 0)
                                @if($sanpham->sanphamHuongVis)
                                    @foreach($sanpham->sanphamHuongVis as $huongviItem)
                                        {{-- <!-- <input type="radio" name="huongviSelection" value="{{ $huongviItem->id }}" /> {{ $huongviItem->huongvi->tenhuongvi }} --> --}}
                                        <label class="huongviSelectionLabel" style="background-color: {{ $huongviItem->huongvi->code }}"
                                            wire:click="huongviSelected({{ $huongviItem->id }})"
                                            >
                                            {{ $huongviItem->huongvi->tenhuongvi }}

                                        </label>
                                    @endforeach    
                                @endif

                                <div>

                                    @if($this->sanphamHuongViSelectedSoluong == 'Hết Hàng')
                                        <label class="btn-sm py-1 mt-2 text-white bg-danger">Hết Hàng</label>
                                    @elseif($this->sanphamHuongViSelectedSoluong >0)
                                        <label class="btn-sm py-1 mt-2 text-white bg-success">Còn Hàng</label>
                                    @endif
                                </div>

                            @else   

                                @if($sanpham->soluong)
                                    <label class="btn-sm py-1 mt-2 text-white bg-success">Còn Hàng</label>
                                @else    
                                    <label class="btn-sm py-1 mt-2 text-white bg-danger">Hết Hàng</label>
                                @endif

                            @endif
                            
                        </div>

                        
                        <div>
                            @if($sanpham->sanphamKichthuocs->count() > 0)
                                @if($sanpham->sanphamKichthuocs)
                                    @foreach($sanpham->sanphamKichthuocs as $kichthuocItem)
                                        {{-- <!-- <input type="radio" name="huongviSelection" value="{{ $kichthuocItem->id }}" /> {{ $kichthuocItem->kichthuoc->tenkichthuoc }} --> --}}
                                        <label class="kichthuocSelectionLabel" style="background-color: {{ $kichthuocItem->kichthuoc->makichthuoc }}"
                                            wire:click="kichthuocSelected({{ $kichthuocItem->id }})"
                                            >
                                            {{ $kichthuocItem->kichthuoc->tenkichthuoc }}

                                        </label>
                                    @endforeach    
                                @endif

                                <div>

                                    @if($this->sanphamKichthuocSelectedSoluong == 'Hết Hàng')
                                        <label class="btn-sm py-1 mt-2 text-white bg-danger">Hết Hàng</label>
                                    @elseif($this->sanphamKichthuocSelectedSoluong >0)
                                        <label class="btn-sm py-1 mt-2 text-white bg-success">Còn Hàng</label>
                                    @endif
                                </div>

                            @else   

                                @if($sanpham->soluong)
                                    <label class="btn-sm py-1 mt-2 text-white bg-success">Còn Hàng</label>
                                @else    
                                    <label class="btn-sm py-1 mt-2 text-white bg-danger">Hết Hàng</label>
                                @endif

                            @endif
                            
                        </div>

                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementSoluong"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount}}" readonly class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementSoluong"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            
                            <button type="button" wire:click="addToCart({{ $sanpham->id }})" class="btn btn1"> 
                                <i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng
                            </button>



                            <button type="button" wire:click="addToWishList({{ $sanpham->id }})" class="btn btn1"> 
                                <span wire:loading.remove wire:target="addToWishList">
                                    <i class="fa fa-heart"></i> Thêm Vào Danh Sách Yêu Thích 
                                </span>
                                <span wire:loading wire:target="addToWishList">Đang Thêm...</span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Mô Tả</h5>
                            <p>
                                {!! $sanpham->small_mota !!}
                                
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Mô Tả</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {!! $sanpham->mota !!}
                               
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')

<script>
    $(function(){

        $("#exzoom").exzoom({
            "navWidth": 60,
            "navHeight": 60,
            "navItemNum": 5,
            "navItemMargin": 7,
            "navBorder": 1,
            "autoPlay": false,
            "autoPlayTimeout": 2000
        });

    });    
</script>

@endpush