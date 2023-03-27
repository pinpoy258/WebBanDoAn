<div>
    <div class="row">
        <div class="col-md-3">
            @if ($loaisp->nhacungcaps)
            <div class="card">
                <div class="card-header"><h4>Các Nhà Cung Cấp</h4></div>
                <div class="card-body">
                    @foreach ($loaisp->nhacungcaps as $nhacungcapItem)
                    <label class="d-block">
                        <input type="checkbox" wire:model="nhacungcapInputs" value="{{ $nhacungcapItem->tennhacungcap }}" /> {{ $nhacungcapItem->tennhacungcap }}
                    </label>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="card mt-3">
                <div class="card-header"><h4>Gía</h4></div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low" /> Giảm dần                   
                    </label>

                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high" /> Tăng dần                   
                    </label>
                </div>
            </div>

        </div>
        <div class="col-md-9">


    <div class="row">
         @forelse($sanphams as $sanphamItem)
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if ($sanphamItem->soluong > 0)
                            <label class="stock bg-success">Còn Hàng</label>
                            @else
                            <label class="stock bg-danger">Hết Hàng</label>
                            @endif
                            
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
        <div class="col-md-12">
            <div class="p-2">
                <h4>Sản Phẩm Không Có Sẵn for{{ $loaisp->tenloai }}</h4>
            </div>
        </div>
         @endforelse
    </div>

        </div>
    </div>
</div>
