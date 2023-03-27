<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/orders') }}">
              <i class="mdi mdi-sale menu-icon"></i>
              <span class="menu-title">Đơn Hàng</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#loaisp" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-view-list menu-icon"></i>
              <span class="menu-title">Loại Sản Phẩm</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="loaisp">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('admin/loaisp/create') }}">Thêm Loại</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('admin/loaisp') }}">Xem Loại Sản Phẩm</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#sanphams" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Sản Phẩm</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sanphams">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('admin/sanphams/create') }}">Thêm Sản Phẩm</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('admin/sanphams') }}">Xem Sản Phẩm</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/nhacungcaps') }}">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Nhà Cung Cấp</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/huongvis') }}">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Hương Vị</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/kichthuocs') }}">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Kích thước</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#"> Thêm User </a></li>
                <li class="nav-item"> <a class="nav-link" href="#"> Xem User </a></li>

              </ul>
            </div>

            <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/sliders') }}">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Home Slider</span>
            </a>
          </li>

          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/settings') }}">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">Cài Đặt Trang</span>
            </a>
          </li>
        </ul>
      </nav>