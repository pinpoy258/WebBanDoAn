@extends('layouts.app')

@section('tieude', 'Cảm Ơn Bạn Vì Đã Mua Hàng')

@section('content')

    
    <div class="py-3 pyt-md-a">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if (session('message'))
                        <h5 class="alert alert-success">{{ session('message')}}</h5>
                    @endif

                    <div class="p-4 shadow bg-white">       
                        <h2>You Logo</h2>
                        <h4>Cảm ơn bạn đã mua hàng tại web ăn vặt</h4>
                        <a href="{{ url('collections') }}" class="btn btn-primary">Mua Ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection



