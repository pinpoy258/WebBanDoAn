<?php

namespace App\Http\Livewire\Frontend\Giohang;

use Livewire\Component;
use App\Models\Giohang;

class GiohangShow extends Component
{
    public $giohang, $tongGia = 0;

   

    public function decrementSoluong(int $giohangId)
    {
        $giohangData = Giohang::where('id', $giohangId)->where('user_id', auth()->user()->id)->first();
        if($giohangData)
        {
            if($giohangData->sanphamHuongVi()->where('id',$giohangData->sanpham_huongvi_id)->exists() &&$giohangData->sanphamKichthuoc()->where('id',$giohangData->sanpham_kichthuoc_id)->exists() ){

                $sanphamHuongVi = $giohangData->sanphamHuongVi()->where('id',$giohangData->sanpham_huongvi_id)->first();
                $sanphamKichthuoc = $giohangData->sanphamKichthuoc()->where('id',$giohangData->sanpham_kichthuoc_id)->first();
                
                if($sanphamHuongVi->soluong > $giohangData->soluong && $sanphamKichthuoc->soluong > $giohangData->soluong){
                    
                    $giohangData->decrement('soluong');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Số lượng đã được cập nhật',
                        'type' => 'success',
                        'trangthai' => 200
                     ]);
                }else{
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Chỉ ' .$sanphamHuongVi->soluong.' Số Lượng Có Sẵn' , 'text' => 'Only ' .$sanphamKichthuoc->soluong.' Số Lượng Có Sẵn',
                        'type' => 'success',
                        'trangthai' => 200
                     ]);
                }

            }else{

                if($giohangData->sanpham->soluong > $giohangData->soluong)
                {
                    $giohangData->decrement('soluong');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Số lượng đã được cập nhật',
                        'type' => 'success',
                        'trangthai' => 200
                     ]);
                }else{
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' .$giohangData->sanpham->soluong. ' Số Lượng Có Sẵn',
                        'type' => 'success',
                        'trangthai' => 200
                     ]);
                }
            }
            
        }else{
            
            $this->dispatchBrowserEvent('message', [
                'text' => 'Đã xảy ra sự cố',
                'type' => 'error',
                'trangthai' => 404
             ]);
        }
    }


    public function incrementSoluong(int $giohangId)
    {
        $giohangData = Giohang::where('id', $giohangId)->where('user_id', auth()->user()->id)->first();
        if($giohangData)
        {
            if($giohangData->sanphamHuongVi()->where('id',$giohangData->sanpham_huongvi_id)->exists() &&$giohangData->sanphamKichthuoc()->where('id',$giohangData->sanpham_kichthuoc_id)->exists() ){

                $sanphamHuongVi = $giohangData->sanphamHuongVi()->where('id',$giohangData->sanpham_huongvi_id)->first();
                $sanphamKichthuoc = $giohangData->sanphamKichthuoc()->where('id',$giohangData->sanpham_kichthuoc_id)->first();
                
                if($sanphamHuongVi->soluong > $giohangData->soluong && $sanphamKichthuoc->soluong > $giohangData->soluong){
                    
                    $giohangData->increment('soluong');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Số lượng đã được cập nhật',
                        'type' => 'success',
                        'trangthai' => 200
                     ]);
                }else{
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Chỉ ' .$sanphamHuongVi->soluong.' Số Lượng Có Sẵn' , 'text' => 'Only ' .$sanphamKichthuoc->soluong.' Số Lượng Có Sẵn',
                        'type' => 'success',
                        'trangthai' => 200
                     ]);
                }

            }else{

                if($giohangData->sanpham->soluong > $giohangData->soluong)
                {
                    $giohangData->increment('soluong');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Số lượng đã được cập nhật',
                        'type' => 'success',
                        'trangthai' => 200
                     ]);
                }else{
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' .$giohangData->sanpham->soluong. ' Số Lượng Có Sẵn',
                        'type' => 'success',
                        'trangthai' => 200
                     ]);
                }
            }
            
        }else{
            
            $this->dispatchBrowserEvent('message', [
                'text' => 'Đã xảy ra sự cố',
                'type' => 'error',
                'trangthai' => 404
             ]);
        }
    }

    public function removeGiohangItem(int $giohangId)
    {
        $giohangRemoveData = Giohang::where('user_id', auth()->user()->id)->where('id',$giohangId)->first();
        if($giohangRemoveData){
            $giohangRemoveData->delete();

            $this->emit('CartAddedUpdated');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Xóa Sản Phẩm Giỏ Hàng Thành Công',
                'type' => 'success',
                'trangthai' => 200
            ]);
        }else{

            $this->dispatchBrowserEvent('message', [
                'text' => 'Xảy Ra Sự Cố!',
                'type' => 'error',
                'trangthai' => 500
            ]);
        }
    }

    public function render()
    {
        $this->giohang = Giohang::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.giohang.giohang-show',[
            'giohang' => $this->giohang
        ]);
        
    }
}
