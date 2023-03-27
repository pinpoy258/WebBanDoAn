<?php

namespace App\Http\Controllers\Admin;

use App\Models\HuongVi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HuongViFormRequest;

class HuongViController extends Controller
{
    public function index()
    {
        $huongvis = HuongVi::all();
        return view('admin.huongvis.index',compact('huongvis'));
    }

    public function create()
    {
        return view('admin.huongvis.create');
    }

    public function store(HuongViFormRequest $request)
    {
        $validatedData = $request ->validated();
        $validatedData['trangthai'] = $request->trangthai == true ? '1':'0';
        HuongVi::create($validatedData);

        return redirect('admin/huongvis')->with('message', 'Hương Vị Đã Được Thêm Thành Công');
    }

    public function edit(HuongVi $huongvi)
    {
        return view('admin.huongvis.edit',compact('huongvi'));
    }

    public function update(HuongViFormRequest $request, $huongvi_id)
    {
        $validatedData = $request ->validated();
        $validatedData['trangthai'] = $request->trangthai == true ? '1':'0';
        HuongVi::find($huongvi_id)->update($validatedData);

        return redirect('admin/huongvis')->with('message', 'Hương Vị Đã Được Cập Nhật Thành Công');
    }

    public function destroy($huongvi_id)
    {
        $huongvi = HuongVi::findOrFail($huongvi_id);
        $huongvi->delete();
        return redirect('admin/huongvis')->with('message', 'Hương Vị Đã Được Xóa Thành Công');
    }
}
