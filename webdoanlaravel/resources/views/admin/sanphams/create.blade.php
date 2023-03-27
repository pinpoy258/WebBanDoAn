@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Thêm Sản Phẩm
                    <a href="{{ url('admin/sanphams') }}" class="btn btn-danger btn-sm text-white float-end">
                        Trở Về
                    </a>
                </h3>
            </div>
    <div class="card-body">

        @if ($errors ->any())
        <div class="alert alert-warning">
            @foreach($errors ->all() as $error)
                <div>{{$error}}</div>
            @endforeach    
        </div>
        @endif


        <form action="{{ url('admin/sanphams') }}" method="POST" enctype="multipart/form-data">
            @csrf

        
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
        Trang Chủ
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
        SEO Tags
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="chitiets-tab" data-bs-toggle="tab" data-bs-target="#chitiets-tab-pane" type="button" role="tab" aria-controls="chitiets-tab-pane" aria-selected="false">
        Chi Tiết
    </button>
  </li>

  <li class="nav-item" role="presentation">
    <button class="nav-link" id="hinhanh-tab" data-bs-toggle="tab" data-bs-target="#hinhanh-tab-pane" type="button" role="tab" aria-controls="hinhanh-tab-pane" aria-selected="false">
        Hình Ảnh Sản Phẩm
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="huongvi-tab" data-bs-toggle="tab" data-bs-target="#huongvi-tab-pane" type="button" role="tab" aria-controls="huongvi-tab-pane" aria-selected="false">
        Hương Vị Sản Phẩm
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="kichthuoc-tab" data-bs-toggle="tab" data-bs-target="#kichthuoc-tab-pane" type="button" role="tab" aria-controls="kichthuoc-tab-pane" aria-selected="false">
        Kích Thước Sản Phẩm
    </button>
  </li>
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
      <div class="mb-3">
          <label>Loại Sản Phẩm</label>
          <select name="loaisp_id" class="form-control">
              @foreach($loaisps as $loaisp)
              <option value="{{ $loaisp->id }}">{{ $loaisp->tenloai }}</option>
              @endforeach
          </select>
      </div>
      <div class="mb-3">
          <label>Tên Sản Phẩm</label>
          <input type="text" name="tensanpham" class="form-control"/>  
      </div>
      <div class="mb-3">
          <label>Sản Phẩm Slug</label>
          <input type="text" name="slug" class="form-control"/>  
      </div>
      <div class="mb-3">
          <label>Chọn Nhà Cung Cấp</label>
          <select name="nhacungcap" class="form-control">
              @foreach($nhacungcaps as $nhacungcap)
              <option value="{{ $nhacungcap->tennhacungcap }}">{{ $nhacungcap->tennhacungcap }}</option>
              @endforeach
          </select>
      </div>
      <div class="mb-3">
          <label> Small Mô Tả (500 từ)</label>
          <textarea name="small_mota" class="form-control" rows="4"></textarea>
      </div>
      <div class="mb-3">
          <label>Mô Tả</label>
          <textarea name="mota" class="form-control" rows="4"></textarea>
      </div>
          
          


  </div>
  <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
      <div class="mb-3">
          <label>Meta Tiêu Đề</label>
          <input type="text" name="meta_tieude" class="form-control"/>  
      </div>

      <div class="mb-3">
          <label> Meta Mô Tả </label>
          <textarea name="meta_mota" class="form-control" rows="4"></textarea>
      </div>
      <div class="mb-3">
          <label>Meta keyword</label>
          <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
      </div>

  </div>
  <div class="tab-pane fade border p-3" id="chitiets-tab-pane" role="tabpanel" aria-labelledby="chitiets-tab" tabindex="0">
      <div class="row">

          <div class="col-md-4">
            <div class="mb-3">
                <label>Gía Gốc</label>
                <input type="text" name="original_gia" class="form-control"/>  
            </div>
          </div>

          <div class="col-md-4">
            <div class="mb-3">
                <label>Gía Bán</label>
                <input type="text" name="selling_gia" class="form-control"/>  
            </div>
          </div>

          <div class="col-md-4">
            <div class="mb-3">
                <label>Số Lượng</label>
                <input type="number" name="soluong" class="form-control"/>  
            </div>
          </div>

            <div class="col-md-4">
            <div class="mb-3">
                <label>Bán Chạy</label>
                <input type="checkbox" name="banchay" style="width:50px;height:50px;"/>  
            </div>
          </div>

          <div class="col-md-4">
            <div class="mb-3">
                <label>Nổi Bật</label>
                <input type="checkbox" name="noibat" style="width:50px;height:50px;"/>  
            </div>
          </div>

          <div class="col-md-4">
            <div class="mb-3">
                <label>Trạng Thái</label>
                <input type="checkbox" name="trangthai" style="width:50px;height:50px;"/>  
            </div>
          </div>
          
      </div>
    </div>
    

<div class="tab-pane fade border p-3" id="hinhanh-tab-pane" role="tabpanel" aria-labelledby="hinhanh-tab" tabindex="0">         
    <div class="mb-3">
        <label>Upload Hình Ảnh</label>
        <input type="file" name="hinhanh[]" multiple class="form-control" />
    </div>
</div>
<div class="tab-pane fade border p-3" id="huongvi-tab-pane" role="tabpanel" aria-labelledby="huongvi-tab" tabindex="0">         
    <div class="mb-3">
        <label>Chọn Hương Vị</label>
        <hr/>
        <div class="row">
            @forelse ($huongvis as $huongviitem)
            <div class="col-md-3">
                <div class="p-2 border mb-3">
                    Hương Vị: <input type="checkbox" name="huongvis[{{ $huongviitem->id }}]" value="{{ $huongviitem->id }}" />
                    {{ $huongviitem->tenhuongvi }}
                    <br/>
                    Số Lượng: <input type="number" name="huongvisoluong[{{ $huongviitem->id }}]" style="width:70px;border 1px solid">
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <h1>Không tìm thấy hương vị</h1>
            </div>
            @endforelse
     
        </div>
        
    </div>
</div>

<div class="tab-pane fade border p-3" id="kichthuoc-tab-pane" role="tabpanel" aria-labelledby="kichthuoc-tab" tabindex="0">         
    <div class="mb-3">
        <label>Chọn Kích Thước</label>
        <hr/>
        <div class="row">
            @forelse ($kichthuocs as $kichthuocitem)
            <div class="col-md-3">
                <div class="p-2 border mb-3">
                    Kích Thước: <input type="checkbox" name="kichthuocs[{{ $kichthuocitem->id }}]" value="{{ $kichthuocitem->id }}" />
                    {{ $kichthuocitem->tenkichthuoc }}
                    <br/>
                    Số Lượng: <input type="number" name="kichthuocsoluong[{{ $kichthuocitem->id }}]" style="width:70px;border 1px solid">
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <h1>Không tìm thấy kích thước</h1>
            </div>
            @endforelse
     
        </div>
        
    </div>
</div>



                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

            </div> 
        </div> 
    </div> 
</div>    

@endsection
