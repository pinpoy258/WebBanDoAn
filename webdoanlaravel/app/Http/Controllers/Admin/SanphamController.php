<?php

namespace App\Http\Controllers\Admin;

use App\Models\Nhacungcap;
use App\Models\HuongVi;
use App\Models\Kichthuoc;
use App\Models\Sanpham;
use App\Models\Loaisp;
use App\Models\SanphamHinhanh;
use Illuminate\Support\Str;
use App\Models\SanphamHuongVi;
use App\Models\SanphamKichthuoc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SanphamFormRequest;

class SanphamController extends Controller
{
    public function index()
    {
        $sanphams = Sanpham::paginate(10);
        return view('admin.sanphams.index', compact('sanphams'));
    }

    public function create()
    {
        $loaisps = Loaisp::all();
        $nhacungcaps = Nhacungcap::all();
        $huongvis = HuongVi::where('trangthai','0')->get();
        $kichthuocs = Kichthuoc::where('trangthai','0')->get();
        return view('admin.sanphams.create', compact('loaisps','nhacungcaps','huongvis','kichthuocs'));
    }

    public function store(SanphamFormRequest $request)
    {
        $validatedData = $request->validated();

        $loaisp = Loaisp::findOrFail($validatedData['loaisp_id']);
        
        $sanpham = $loaisp->sanphams()->create([
            'loaisp_id'=> $validatedData['loaisp_id'],
            'tensanpham'=> $validatedData['tensanpham'],
            'slug'=> Str::slug($validatedData['slug']),
            'nhacungcap'=> $validatedData['nhacungcap'],
            'small_mota'=> $validatedData['small_mota'],
            'mota'=> $validatedData['mota'],
            'original_gia'=> $validatedData['original_gia'],
            'selling_gia'=> $validatedData['selling_gia'],
            'soluong'=> $validatedData['soluong'],
            'banchay'=> $request->banchay == true ? '1':'0',
            'noibat'=> $request->noibat == true ? '1':'0',
            'trangthai'=> $request->trangthai == true ? '1':'0',
            'meta_tieude'=> $validatedData['meta_tieude'],
            'meta_keyword'=> $validatedData['meta_keyword'],
            'meta_mota'=> $validatedData['meta_mota'],
        ]);


        if($request->hasFile('hinhanh')){
            $uploadPath ='uploads/sanphams/';
            
            $i = 1;
            foreach($request->file('hinhanh') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $sanpham->sanphamHinhanhs()->create([
                    'sanpham_id' => $sanpham->id,
                    'hinhanh' => $finalImagePathName,
                ]);
            }
        }
        
        if($request->huongvis){
            foreach($request->huongvis as $key => $huongvi){
                $sanpham->sanphamHuongVis()->create([
                    'sanpham_id'=>$sanpham->id,
                    'huongvi_id'=>$huongvi,
                    'soluong' => $request->huongvisoluong[$key] ?? 0
                ]);
            }
        }

        if($request->kichthuocs){
            foreach($request->kichthuocs as $key => $kichthuoc){
                $sanpham->sanphamKichthuocs()->create([
                    'sanpham_id'=>$sanpham->id,
                    'kichthuoc_id'=>$kichthuoc,
                    'soluong' => $request->kichthuocsoluong[$key] ?? 0
                ]);
            }
        }

        return redirect('/admin/sanphams')->with('message', 'Sản Phẩm Đã Thêm Thành Công');
    }

    public function edit(int $sanpham_id)
    {
        $loaisps = Loaisp::all();
        $nhacungcaps = Nhacungcap::all();
        $sanpham = Sanpham::findOrFail($sanpham_id);

        $sanpham_huongvi = $sanpham->sanphamHuongVis->pluck('huongvi_id')->toArray();
        $huongvis = HuongVi::whereNotIn('id',$sanpham_huongvi)->get();

        $sanpham_kichthuoc = $sanpham->sanphamKichthuocs->pluck('kichthuoc_id')->toArray();
        $kichthuocs = Kichthuoc::whereNotIn('id',$sanpham_kichthuoc)->get();

        return view('admin.sanphams.edit', compact('loaisps', 'nhacungcaps','sanpham','huongvis','kichthuocs'));
    }

    public function update(SanphamFormRequest $request, int $sanpham_id )
    {
        $validatedData = $request->validated();

        $sanpham = Loaisp::findOrFail($validatedData['loaisp_id'])
                        ->sanphams()->where('id',$sanpham_id)->first();
        if($sanpham)
        {
            $sanpham->update([
                'loaisp_id'=> $validatedData['loaisp_id'],
                'tensanpham'=> $validatedData['tensanpham'],
                'slug'=> Str::slug($validatedData['slug']),
                'nhacungcap'=> $validatedData['nhacungcap'],
                'small_mota'=> $validatedData['small_mota'],
                'mota'=> $validatedData['mota'],
                'original_gia'=> $validatedData['original_gia'],
                'selling_gia'=> $validatedData['selling_gia'],
                'soluong'=> $validatedData['soluong'],
                'banchay'=> $request->banchay == true ? '1':'0',
                'noibat'=> $request->noibat == true ? '1':'0',
                'trangthai'=> $request->trangthai == true ? '1':'0',
                'meta_tieude'=> $validatedData['meta_tieude'],
                'meta_keyword'=> $validatedData['meta_keyword'],
                'meta_mota'=> $validatedData['meta_mota'],
            ]);

            if($request->hasFile('hinhanh')){
                $uploadPath ='uploads/sanphams/';
                
                $i = 1;
                foreach($request->file('hinhanh') as $imageFile){
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extention;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName = $uploadPath.$filename;
    
                    $sanpham->sanphamHinhanhs()->create([
                        'sanpham_id' => $sanpham->id,
                        'hinhanh' => $finalImagePathName,
                    ]);
                }
            }

            if($request->huongvis){
                foreach($request->huongvis as $key => $huongvi){
                    $sanpham->sanphamHuongVis()->create([
                        'sanpham_id'=>$sanpham->id,
                        'huongvi_id'=>$huongvi,
                        'soluong' => $request->huongvisoluong[$key] ?? 0
                    ]);
                }
            }

            if($request->kichthuocs){
                foreach($request->kichthuocs as $key => $kichthuoc){
                    $sanpham->sanphamKichthuocs()->create([
                        'sanpham_id'=>$sanpham->id,
                        'kichthuoc_id'=>$kichthuoc,
                        'soluong' => $request->kichthuocsoluong[$key] ?? 0
                    ]);
                }
            }
    
    
            return redirect('/admin/sanphams')->with('message', 'Sản Phẩm Đã Cập Nhật Thành Công');
        }
        else
        {
            return redirect('admin/sanphams')->with('message', 'Không Tìm Thấy Id Sản Phẩm');
        }
    }


    public function destroyHinhanh(int $sanpham_hinhanh_id)
    {
        $sanphamHinhanh = SanphamHinhanh::findOrFail($sanpham_hinhanh_id);
        if(File::exists($sanphamHinhanh->hinhanh)){
            File::delete($sanphamHinhanh->hinhanh);
        }
        $sanphamHinhanh->delete();
        return redirect()->back()->with('message', 'Đã Xóa Hình Ảnh Sản Phẩm');
    }

    public function destroy(int $sanpham_id)
    {
        $sanpham = Sanpham::findOrFail($sanpham_id);
        if($sanpham->sanphamHinhanhs){
            foreach($sanpham->sanphamHinhanhs as $hinhanh){
                if(File::exists($hinhanh->hinhanh)){
                    File::delete($hinhanh->hinhanh);
                }
            }
        }
        $sanpham->delete();
        return redirect()->back()->with('message', 'Đã Xóa Sản Phẩm Với Tất Cả Hình Ảnh');
    }

    public function updateSanphamHuongViSluong(Request $request, $sanpham_huongvi_id)
    {
        $sanphamHuongViData = Sanpham::findOrFail($request->sanpham_id)
                                    ->sanphamHuongVis()->where('id',$sanpham_huongvi_id)->first();
        $sanphamHuongViData->update([
            'soluong' => $request->sluong
        ]);
        return response()->json(['message'=>'Số Lượng Hương Vị Sản Phẩm Đã Được Cập Nhật']);
    }

    public function updateSanphamKichthuocSluong(Request $request, $sanpham_kichthuoc_id)
    {
        $sanphamKichthuocData = Sanpham::findOrFail($request->sanpham_id)
                                    ->sanphamKichthuocs()->where('id',$sanpham_kichthuoc_id)->first();
        $sanphamKichthuocData->update([
            'soluong' => $request->sluong
        ]);
        return response()->json(['message'=>'Số Lượng Kích Thước Sản Phẩm Đã Được Cập Nhật']);
    }



    public function deleteSanphamHuongVi($sanpham_huongvi_id)
    {
        $sanphamHuongVi = SanphamHuongVi::findOrFail($sanpham_huongvi_id);
        $sanphamHuongVi->delete();
        return response()->json(['message'=>'Hương Vị Sản Phẩm Đã Được Xóa']);

    }

    public function deleteSanphamKichthuoc($sanpham_kichthuoc_id)
    {
        $sanphamKichthuoc = SanphamKichthuoc::findOrFail($sanpham_kichthuoc_id);
        $sanphamKichthuoc->delete();
        return response()->json(['message'=>'Kích Thước Sản Phẩm Đã Được Xóa']);

    }
}
