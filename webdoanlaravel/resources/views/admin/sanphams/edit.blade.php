@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        
        @if(session('message'))
        <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Sửa Sản Phẩm
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


        <form action="{{ url('admin/sanphams/'.$sanpham->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
       
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
    <button class="nav-link" id="huongvis-tab" data-bs-toggle="tab" data-bs-target="#huongvis-tab-pane" type="button" role="tab" aria-controls="huongvis-tab-pane" aria-selected="false">
        Hương Vị Sản Phẩm
    </button>
  </li>

  <li class="nav-item" role="presentation">
    <button class="nav-link" id="kichthuocs-tab" data-bs-toggle="tab" data-bs-target="#kichthuocs-tab-pane" type="button" role="tab">
        Kích Thước Sản Phẩm
    </button>
  </li>
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
      <div class="mb-3">
          <label>Chọn Loại Sản Phẩm</label>
          <select name="loaisp_id" class="form-control">
              @foreach($loaisps as $loaisp)
              <option value="{{ $loaisp->id }}" {{ $loaisp->id == $sanpham->loaisp_id ? 'selected':'' }} >
                  {{ $loaisp->tenloai }}
                </option>
              @endforeach
          </select>
      </div>
      <div class="mb-3">
          <label>Tên Sản Phẩm</label>
          <input type="text" name="tensanpham" value="{{ $sanpham->tensanpham }}" class="form-control"/>  
      </div>
      <div class="mb-3">
          <label>Sản Phẩm Slug</label>
          <input type="text" name="slug" value="{{ $sanpham->slug }}" class="form-control"/>  
      </div>
      <div class="mb-3">
          <label>Chọn Nhà Cung Cấp</label>
          <select name="nhacungcap" class="form-control">
              @foreach($nhacungcaps as $nhacungcap)
              <option value="{{ $nhacungcap->tennhacungcap }}" {{ $nhacungcap->tennhacungcap == $sanpham->nhacungcap ? 'selected':'' }} >
                  {{ $nhacungcap->tennhacungcap }}
                </option>
              @endforeach
          </select>
      </div>
      <div class="mb-3">
          <label> Small Mô Tả (500 từ)</label>
          <textarea name="small_mota" class="form-control" rows="4">{{ $sanpham->small_mota }}</textarea>
      </div>
      <div class="mb-3">
          <label>Mô Tả</label>
          <textarea name="mota" class="form-control" rows="4">{{ $sanpham->mota }}</textarea>
      </div>
          
          


  </div>
  <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
      <div class="mb-3">
          <label>Meta Tiêu Đề</label>
          <input type="text" name="meta_tieude" value="{{ $sanpham->meta_tieude }}" class="form-control"/>  
      </div>

      <div class="mb-3">
          <label> Meta Mô Tả </label>
          <textarea name="meta_mota" class="form-control" rows="4">{{ $sanpham->meta_mota }}</textarea>
      </div>
      <div class="mb-3">
          <label>Meta keyword</label>
          <textarea name="meta_keyword" class="form-control" rows="4">{{ $sanpham->meta_keyword }}</textarea>
      </div>

  </div>
  <div class="tab-pane fade border p-3" id="chitiets-tab-pane" role="tabpanel" aria-labelledby="chitiets-tab" tabindex="0">
      <div class="row">

          <div class="col-md-4">
            <div class="mb-3">
                <label>Gía Gốc</label>
                <input type="text" name="original_gia" value="{{ $sanpham->original_gia }}" class="form-control"/>  
            </div>
          </div>

          <div class="col-md-4">
            <div class="mb-3">
                <label>Gía Bán</label>
                <input type="text" name="selling_gia" value="{{ $sanpham->selling_gia }}" class="form-control"/>  
            </div>
          </div>

          <div class="col-md-4">
            <div class="mb-3">
                <label>Số Lượng</label>
                <input type="number" name="soluong" value="{{ $sanpham->soluong }}" class="form-control"/>  
            </div>
          </div>

            <div class="col-md-4">
            <div class="mb-3">
                <label>Bán Chạy</label>
                <input type="checkbox" name="banchay" value="{{ $sanpham->banchay == '1' ? 'checked': ''}}" style="width:50px;height:50px;"/>  
            </div>
          </div>

          <div class="col-md-4">
            <div class="mb-3">
                <label>Nổi Bật</label>
                <input type="checkbox" name="noibat" value="{{ $sanpham->noibat == '1' ? 'checked': ''}}" style="width:50px;height:50px;"/>  
            </div>
          </div>

          <div class="col-md-4">
            <div class="mb-3">
                <label>Trạng Thái</label>
                <input type="checkbox" name="trangthai"  value="{{ $sanpham->trangthai == '1' ? 'checked': ''}}" style="width:50px;height:50px;"/>  
            </div>
          </div>
          
      </div>
    </div>
    

<div class="tab-pane fade border p-3" id="hinhanh-tab-pane" role="tabpanel" aria-labelledby="hinhanh-tab" tabindex="0">         
    <div class="mb-3">
        <label>Upload Hình Ảnh</label>
        <input type="file" name="hinhanh[]" multiple class="form-control" />
    </div>
    <div>
        @if($sanpham->sanphamHinhanhs)
        <div class="row">
            @foreach($sanpham->sanphamHinhanhs as $hinhanh)
            <div class="col-md-2">
                <img src="{{ asset($hinhanh->hinhanh) }}" style="width:80px;height:80px;" 
                   class="me-4 border" alt="Img" />
                <a href="{{ url('admin/sanpham-hinhanh/' .$hinhanh->id. '/delete') }}" class="d-block">Xóa</a>
            </div>
            @endforeach
        </div>   
        @else
        <h5>Hình Ảnh Không Được Thêm</h5>
        @endif
    </div>
    
</div>

<div class="tab-pane fade border p-3" id="huongvis-tab-pane" role="tabpanel" tabindex="0"> 
    <div class="mb-3">
        <h4>Thêm Hương Vị Sản Phẩm</h4>
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

    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <td>Tên Hương Vị</td>
                    <td>Số Lượng</td>
                    <td>Xóa</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($sanpham->sanphamHuongVis as $sanphamHuongVi)
                <tr class="sanpham-huongvi-tr">
                    <td>
                        @if($sanphamHuongVi->huongvi)
                        {{ $sanphamHuongVi->huongvi->tenhuongvi }}
                        @else
                        Không Tìm Thấy Hương Vị
                        @endif
                    </td>
                    <td>
                        <div class="input-group mb-3" style="width:150px">
                            <input type="text" value="{{ $sanphamHuongVi->soluong }}" class="sanphamSoluongHuongVi form-control form-control-sm"/>
                            <button type="button" value="{{ $sanphamHuongVi->id }}" class="updateSanphamHuongViBtn btn btn-primary btn-sm text-white">Cập Nhật</button>
                        </div>
                    </td>
                    <td>
                        <button type="button" value="{{ $sanphamHuongVi->id }}" class="deleteSanphamHuongViBtn btn btn-danger btn-sm text-white">Xóa</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="tab-pane fade border p-3" id="kichthuocs-tab-pane" role="tabpanel" tabindex="0"> 

    <div class="mb-3">
        <h4>Thêm Kích Thước Sản Phẩm</h4>
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

    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <td>Tên Kích Thước</td>
                    <td>Số Lượng</td>
                    <td>Xóa</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($sanpham->sanphamKichthuocs as $sanphamKichthuoc)
                <tr class="sanpham-kichthuoc-tr">
                    <td>
                        @if($sanphamKichthuoc->kichthuoc)
                        {{ $sanphamKichthuoc->kichthuoc->tenkichthuoc }}
                        @else
                        Không Tìm Thấy Kích Thước
                        @endif
                    </td>
                    <td>
                        <div class="input-group mb-3" style="width:150px">
                            <input type="text" value="{{ $sanphamKichthuoc->soluong }}" class="sanphamSoluongKichthuoc form-control form-control-sm"/>
                            <button type="button" value="{{ $sanphamKichthuoc->id }}" class="updateSanphamKichthuocBtn btn btn-primary btn-sm text-white">Cập Nhật</button>
                        </div>
                    </td>
                    <td>
                        <button type="button" value="{{ $sanphamKichthuoc->id }}" class="deleteSanphamKichthuocBtn btn btn-danger btn-sm text-white">Xóa</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

            </div>
            <div class="py-2 float-end">
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                </div>
            </form>

            </div> 
        </div> 
    </div> 
</div>    

@endsection

@section('scripts')

<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
        });

        $(document).on('click', '.updateSanphamHuongViBtn' ,function(){
            
            var sanpham_id = "{{ $sanpham->id }}";
            var sanpham_huongvi_id = $(this).val();
            var sluong = $(this).closest('.sanpham-huongvi-tr').find('.sanphamSoluongHuongVi').val();
            // alert(sanpham_huongvi_id);

            if(sluong <= 0){
                alert('Yêu cầu nhập số lượng');
                return false;
            }

            var data = {
                'sanpham_id':sanpham_id,
                'sluong':sluong
            };

            $.ajax({
                type:"POST",
                url:"/admin/sanpham-huongvi/"+sanpham_huongvi_id,
                data: data,
                success: function(response){
                    alert(response.message)
                }
            });

        });

        $(document).on('click', '.deleteSanphamHuongViBtn' ,function(){
            
            var sanpham_huongvi_id = $(this).val();
            var thisClick = $(this);

            

            $.ajax({
                type:"GET",
                url:"/admin/sanpham-huongvi/"+sanpham_huongvi_id+"/delete",
                success: function(response){
                    thisClick.closest('.sanpham-huongvi-tr').remove();
                    alert(response.message);
                }
            });

        });



    $(document).ready(function () {

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
    });

    $(document).on('click', '.updateSanphamKichthuocBtn' ,function(){
    
    var sanpham_id = "{{ $sanpham->id }}";
    var sanpham_kichthuoc_id = $(this).val();
    var sluong = $(this).closest('.sanpham-kichthuoc-tr').find('.sanphamSoluongKichthuoc').val();
    // alert(sanpham_huongvi_id);

    if(sluong <= 0){
        alert('Yêu cầu nhập số lượng');
        return false;
    }

    var data = {
        'sanpham_id':sanpham_id,
        'sluong':sluong
    };

    $.ajax({
        type:"POST",
        url:"/admin/sanpham-kichthuoc/"+sanpham_kichthuoc_id,
        data: data,
        success: function(response){
            alert(response.message)
        }
    });

    });

    $(document).on('click', '.deleteSanphamKichthuocBtn' ,function(){
    
        var sanpham_kichthuoc_id = $(this).val();
        var thisClick = $(this);

    

        $.ajax({
        type:"GET",
        url:"/admin/sanpham-kichthuoc/"+sanpham_kichthuoc_id+"/delete",
        success: function(response){
            thisClick.closest('.sanpham-kichthuoc-tr').remove();
            alert(response.message);
        }
        });
     });

    });


});
</script>


@endsection


