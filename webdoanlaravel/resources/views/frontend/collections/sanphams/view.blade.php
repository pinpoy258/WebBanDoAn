@extends('layouts.app')

@section('tieude')
{{ $sanpham->meta_tieude }}
@endsection

@section('meta_keyword')
{{ $sanpham->meta_keyword }}
@endsection

@section('meta_mota')
{{ $sanpham->meta_mota }}
@endsection

@section('content')

    <div>
        <livewire:frontend.sanpham.view :loaisp="$loaisp" :sanpham="$sanpham" />
    </div>

@endsection
