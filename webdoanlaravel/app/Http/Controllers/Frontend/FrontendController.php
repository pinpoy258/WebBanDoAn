<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Loaisp;
use App\Models\Sanpham;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('trangthai','0')->get();
        $trendingSanphams = Sanpham::where('banchay','1')->latest()->take(15)->get();
        $sanphamMoisSanphams = Sanpham::latest()->take(14)->get();
        $sanphamNoibat = Sanpham::where('noibat','1')->latest()->take(14)->get();
        return view('frontend.index' , compact('sliders','trendingSanphams', 'sanphamMoisSanphams', 'sanphamNoibat'));
    }

    public function searchSanphams(Request $request)
    {
        if($request->search){

            $searchSanphams = Sanpham::where('tensanpham','LIKE','%'.$request->search.'%')->latest()->paginate(15);
            return view('frontend.pages.search', compact('searchSanphams'));
        }else{

            return redirect()->back()->with('message','Tìm Kiếm Trống');
        }
    }

    public function sanphamMoi()
    {
        $sanphamMoisSanphams = Sanpham::latest()->take(16)->get();
        return view('frontend.pages.sanpham-moi' , compact('sanphamMoisSanphams'));
    }

    public function sanphamNoibat()
    {
        $sanphamNoibat = Sanpham::where('noibat','1')->latest()->get();
        return view('frontend.pages.sanpham-noibat' , compact('sanphamNoibat'));
    }

    public function loaisps()
    {
        $loaisps = Loaisp::where('trangthai','0')->get();
        return view('frontend.collections.loaisp.index',compact('loaisps'));
    }

    public function sanphams($loaisp_slug)
    {
        $loaisp = Loaisp::where('slug',$loaisp_slug)->first();
        if ($loaisp){

            
            return view('frontend.collections.sanphams.index', compact('loaisp'));
        }else{
            return redirect()->back();
        }
    }

    public function sanphamView(string $loaisp_slug, string $sanpham_slug)
    {
        $loaisp = Loaisp::where('slug',$loaisp_slug)->first();
        if ($loaisp){

            $sanpham = $loaisp->sanphams()->where('slug',$sanpham_slug)->where('trangthai','0')->first();
            if ($sanpham)
            {
                return view('frontend.collections.sanphams.view', compact('sanpham','loaisp'));
            }else{
                return redirect()->back();
            }
            
        }else{
            return redirect()->back();
        }
    }

    public function thankyou()
    {
        return view('frontend.thank-you');
    }
}
