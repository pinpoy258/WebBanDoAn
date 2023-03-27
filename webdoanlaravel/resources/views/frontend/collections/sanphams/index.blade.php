@extends('layouts.app')

@section('tieude')
{{ $loaisp->meta_tieude }}
@endsection

@section('meta_keyword')
{{ $loaisp->meta_keyword }}
@endsection

@section('meta_mota')
{{ $loaisp->meta_mota }}
@endsection

@section('content')

<div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h4 class="mb-4">Các Sản Phẩm</h4>
                </div>

                <livewire:frontend.sanpham.index :loaisp="$loaisp" />
                

            </div>    
        </div>  
</div> 

@endsection
