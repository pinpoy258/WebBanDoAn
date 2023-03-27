<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    
    public function create()
    {
        return view('admin.slider.create');   
    }

    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();

        if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['hinhanh'] = "uploads/slider/$filename";
        }

        $validatedData['trangthai'] = $request->trangthai == true ? '1':'0';

        Slider::create([
            'tieude' => $validatedData['tieude'],
            'mota'   => $validatedData['mota'],
            'hinhanh'   => $validatedData['hinhanh'],
            'trangthai'   => $validatedData['trangthai'],
        ]);

        return redirect('admin/sliders')->with('message','Đã Thêm Slider Thành Công');
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderFormRequest $request, Slider $slider)
    {
        
        $validatedData = $request->validated();

        if($request->hasFile('hinhanh')){

            $destination = $slider->hinhanh;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file=$request->file('hinhanh');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['hinhanh'] = "uploads/slider/$filename";
        }

        $validatedData['trangthai'] = $request->trangthai == true ? '1':'0';

        Slider::where('id',$slider->id)->update([
            'tieude' => $validatedData['tieude'],
            'mota'   => $validatedData['mota'],
            'hinhanh'   => $validatedData['hinhanh'] ?? $slider->hinhanh,
            'trangthai'   => $validatedData['trangthai'],
        ]);

        return redirect('admin/sliders')->with('message','Đã Cập Nhật Slider Thành Công');
    }

    public function destroy(Slider $slider)
    {
        if($slider->count() > 0){
            $destination = $slider->hinhanh;
            if(File::exists($destination)){
                File::delete($destination);
            }
             $slider->delete();
             return redirect('admin/sliders')->with('message','Đã Xóa Slider Thành Công');
        }
        return redirect('admin/sliders')->with('message','Đã Xảy Ra Sự Cố');
    }
}
