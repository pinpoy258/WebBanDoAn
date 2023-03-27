<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kichthuoc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\KichthuocFormRequest;

class KichthuocController extends Controller
{
    public function index()
    {
        $kichthuocs = Kichthuoc::all();
        return view('admin.kichthuocs.index',compact('kichthuocs'));
    }

    public function create()
    {
        return view('admin.kichthuocs.create');
    }

    public function store(KichthuocFormRequest $request)
    {
        $validatedData = $request ->validated();
        $validatedData['trangthai'] = $request->trangthai == true ? '1':'0';
        Kichthuoc::create($validatedData);

        return redirect('admin/kichthuocs')->with('message', 'Kích Thước Đã Được Thêm Thành Công');
    }

    public function edit(Kichthuoc $kichthuoc)
    {
        return view('admin.kichthuocs.edit',compact('kichthuoc'));
    }

    public function update(KichthuocFormRequest $request, $kichthuoc_id)
    {
        $validatedData = $request ->validated();
        $validatedData['trangthai'] = $request->trangthai == true ? '1':'0';
        Kichthuoc::find($kichthuoc_id)->update($validatedData);

        return redirect('admin/kichthuocs')->with('message', 'Kích Thước Đã Được Cập Nhật Thành Công');
    }

    public function destroy($kichthuoc_id)
    {
        $kichthuoc = Kichthuoc::findOrFail($kichthuoc_id);
        $kichthuoc->delete();
        return redirect('admin/kichthuocs')->with('message', 'Kích Thước Đã Được Xóa Thành Công');
    }

}
