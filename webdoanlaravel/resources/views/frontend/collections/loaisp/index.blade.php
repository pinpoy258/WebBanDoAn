@extends('layouts.app')

@section('tieude', 'Các Loại Sản Phẩm')

@section('content')

<div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Các Loại Sản Phẩm</h4>
                </div>

                @forelse ($loaisps as $loaispItem)
                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <a href="{{ url('/collections/'.$loaispItem->slug) }}">
                            <div class="category-card-img">
                                <img src="{{ asset("$loaispItem->hinhanh") }}" class="w-100" alt="Đồ Ăn" style="width:250px;height:250px;">
                            </div>
                            <div class="category-card-body">
                                <h5>{{ $loaispItem->tenloai }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                    <div class="col-md-12">
                        <h5>Loại sản phẩm không có sẵn</h5>
                    </div>
                @endforelse

            </div>
        </div>
    </div>

@endsection
