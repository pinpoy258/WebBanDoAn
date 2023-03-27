<?php

namespace App\Http\Controllers\Admin;

use App\Models\Loaisp;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\LoaispFormRequest;

class LoaispController extends Controller
{
    public function index()
    {
        return view('admin.loaisp.index');
    }

    public function create()
    {
        return view('admin.loaisp.create');
    }

    public function store(LoaispFormRequest $request)
    {
        $validatedData = $request->validated();

        $loaisp = new Loaisp;
        $loaisp->tenloai = $validatedData['tenloai'];
        $loaisp->slug = Str::slug($validatedData['slug']);
        $loaisp->mota = $validatedData['mota'];

        $uploadPath = 'uploads/loaisp/';
        if($request->hasFile('hinhanh')){
            $file = $request->file('hinhanh');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/loaisp/',$filename);
            $loaisp->hinhanh = $uploadPath.$filename;
        }
        
        $loaisp->meta_tieude = $validatedData['meta_tieude'];
        $loaisp->meta_keyword = $validatedData['meta_keyword'];
        $loaisp->meta_mota = $validatedData['meta_mota'];

        $loaisp->trangthai = $request->trangthai == true ? '1':'0';
        $loaisp->save();

        return redirect('admin/loaisp')->with('message','Loại Sản Phẩm Đã Thêm Thành Công');
    }

    public function edit(Loaisp $loaisp)
    {
        return view('admin.loaisp.edit', compact('loaisp'));
    }

    public function update(LoaispFormRequest $request, $loaisp)
    {

        $validatedData = $request->validated();

        $loaisp = Loaisp::findOrFail($loaisp);


        $loaisp->tenloai = $validatedData['tenloai'];
        $loaisp->slug = Str::slug($validatedData['slug']);
        $loaisp->mota = $validatedData['mota'];

        if($request->hasFile('hinhanh')){

            $uploadPath = 'uploads/loaisp/';

            $path = 'uploads/loaisp/'.$loaisp->hinhanh;
            if(File::exists($path)){
                File::delete($path);
            }

            $file = $request->file('hinhanh');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/loaisp/',$filename);
            $loaisp->hinhanh = $uploadPath.$filename;
        }
        
        $loaisp->meta_tieude = $validatedData['meta_tieude'];
        $loaisp->meta_keyword = $validatedData['meta_keyword'];
        $loaisp->meta_mota = $validatedData['meta_mota'];

        $loaisp->trangthai = $request->trangthai == true ? '1':'0';
        $loaisp->update();

        return redirect('admin/loaisp')->with('message','Loại Sản Phẩm Đã Cập Nhật Thành Công');
    }
}
