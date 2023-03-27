<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
       return view('admin.setting.index',compact('setting'));
    }

    public function store(Request $request)
    {
        $setting = Setting::first();
        if($setting){
            // Cap Nhat Data
            $setting->update([
                'website_name'=>$request->website_name,
                'website_url'=>$request->website_url,
                'title'=>$request->title,
                'meta_keywords'=>$request->meta_keywords,
                'meta_mota'=>$request->meta_mota,
                'diachi'=>$request->diachi,
                'doan1'=>$request->doan1,
                'doan2'=>$request->doan2,
                'email1'=>$request->email1,
                'email2'=>$request->email2,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'instagram'=>$request->instagram,
                'youtube'=>$request->youtube
            ]);

            return redirect()->back()->with('message','Cài Đặt Đã Cập Nhật');

        }else{
            // Tao Data
            Setting::create([
                'website_name'=>$request->website_name,
                'website_url'=>$request->website_url,
                'title'=>$request->title,
                'meta_keywords'=>$request->meta_keywords,
                'meta_mota'=>$request->meta_mota,
                'diachi'=>$request->diachi,
                'doan1'=>$request->doan1,
                'doan2'=>$request->doan2,
                'email1'=>$request->email1,
                'email2'=>$request->email2,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'instagram'=>$request->instagram,
                'youtube'=>$request->youtube
            ]);

            return redirect()->back()->with('message','Cài Đặt Đã Tạo');
        }
    }
}
