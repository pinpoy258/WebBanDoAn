@extends('layouts.admin')

@section('title','Admin Setting')

@section('content')

<div class="row">
            <div class="col-md-12 grid-margin">

                @if(session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
                @endif

                <form action="{{ url('/admin/settings') }}" method="POST">
                    @csrf

                    <div class="card mb-3">
                       <div class="card-header bg-primary">
                            <h3 class="text-white mb-0">Website</h3>
                       </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label> Tên Webiste</label>
                                    <input type="text" name="website_name" value="{{ $setting->website_name ?? '' }}" class="form-control" />
                                </div>
                                 <div class="col-md-6 mb-3">
                                    <label> Webiste URL</label>
                                    <input type="text" name="website_url" value="{{ $setting->website_url ?? '' }}"  class="form-control" />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Trang Tiêu Đề</label>
                                    <input type="text" name="title" value="{{ $setting->title ?? '' }}"  class="form-control" />
                                 </div>
                                <div class="col-md-6 mb-3">
                                    <label>Meta Keywords</label>
                                    <textarea  name="meta_keywords" class="form-control" rows="3">{{ $setting->meta_keywords ?? '' }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Meta Mô Tả</label>
                                    <textarea  name="meta_mota" class="form-control" rows="3">{{ $setting->meta_mota ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header bg-primary">
                             <h3 class="text-white mb-0"> Thông Tin Website</h3>
                        </div>                 
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-md-12 mb-3">
                                     <label>Địa chỉ</label>
                                     <textarea name="diachi" class="form-control" rows="3">{{ $setting->diachi ?? '' }}</textarea>
                                 </div>
                                  <div class="col-md-6 mb-3">
                                     <label>Số điện thoại 1*</label>
                                     <input type="text" name="doan1" value="{{ $setting->doan1 ?? '' }}" class="form-control" />
                                 </div>
                                 <div class="col-md-12 mb-3">
                                     <label>Số điện thoại No. 2</label>
                                     <input type="text" name="doan2" value="{{ $setting->doan2 ?? '' }}" class="form-control" />
                                  </div>
                                  <div class="col-md-12 mb-3">
                                    <label>Email Id 1 *</label>
                                    <input type="text" name="email1" value="{{ $setting->email1 ?? '' }}"  class="form-control" />
                                 </div>
                                 <div class="col-md-12 mb-3">
                                    <label>Email Id 2 *</label>
                                    <input type="text" name="email2" value="{{ $setting->email2 ?? '' }}" class="form-control" />
                                 </div>
                            </div>
                         </div>
                    </div> 

                        <div class="card mb-3">
                            <div class="card-header bg-primary">
                                <h3 class="text-white mb-0">Website - Mạng Xã Hội</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Facebook (Optional)</label>
                                        <textarea name="facebook" class="form-control">{{ $setting->facebook ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Twitter (Optional)</label>
                                        <input type="text" name="twitter" value="{{ $setting->twitter ?? '' }}" class="form-control" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Instagram (Optional)</label>
                                        <input type="text" name="instagram" value="{{ $setting->instagram ?? '' }}" class="form-control" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Youtube (Optional)</label>
                                        <input type="text" name="youtube" value="{{ $setting->youtube ?? '' }}" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary text-white">Lưu Cài Đặt</button>
                    </div>

                </form>
            </div>
        </div>

@endsection
        
