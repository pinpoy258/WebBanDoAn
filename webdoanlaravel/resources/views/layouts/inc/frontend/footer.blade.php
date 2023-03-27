<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">{{ $appSetting->website_name ?? 'website name' }}</h4>
                    <div class="footer-underline"></div>
                    <p>
                        
                        {{ $appSetting->meta_mota ?? 'mo ta' }}
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Liên Kết Nhanh</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Trang Chủ</a></div>
                    <div class="mb-2"><a href="{{ url('/about-us') }}" class="text-white">Thông Tin Trang Web</a></div>
                    <div class="mb-2"><a href="{{ url('/contact-us') }}" class="text-white">Liên Hệ</a></div>
                    <div class="mb-2"><a href="{{ url('/blogs') }}" class="text-white">Tin Tức</a></div>
                    <div class="mb-2"><a href="#" class="text-white">Sitemaps</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Đặt Hàng Ngay</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/collections') }}" class="text-white">Các Loại Sản Phẩm</a></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Sản Phẩm Bán Chạy</a></div>
                    <div class="mb-2"><a href="{{ url('/sanpham-moi') }}" class="text-white">Sản Phẩm Mới</a></div>
                    <div class="mb-2"><a href="{{ url('/sanpham-noibat') }}" class="text-white">Sản Phẩm Nổi Bật</a></div>
                    <div class="mb-2"><a href="{{ url('/giohang') }}" class="text-white">Giỏ Hàng</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Liên Hệ Với Chúng Tôi</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i> 
                            {{ $appSetting->diachi ?? 'diachi' }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{ $appSetting->doan1 ?? 'doan 1' }}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> {{ $appSetting->email1 ?? 'email 1' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2022 - Web Ăn Vặt 24H. Đã Đăng Ký Bản Quyền.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        {{ $appSetting->doan1 ?? 'doan 1' }}
                        @if($appSetting->facebook)
                            <a href="{{ $appSetting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                        @endif

                        @if($appSetting->twitter)
                           <a href="{{ $appSetting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                        @endif

                        @if($appSetting->instagram)
                            <a href="{{ $appSetting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                        @endif

                        @if($appSetting->youtube)
                            <a href="{{ $appSetting->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>