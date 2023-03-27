<?php

namespace App\Http\Livewire\Frontend\Sanpham;

use App\Models\Wishlist;
use App\Models\Giohang;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $loaisp, $sanpham, $sanphamHuongViSelectedSoluong,$sanphamKichthuocSelectedSoluong, $quantityCount = 1, $sanphamHuongviId, $sanphamKichthuocId;

    public function addToWishList($sanphamId)
    {
        if(Auth::check())
        {
            if(Wishlist::where('user_id',auth()->user()->id)->where('sanpham_id',$sanphamId)->exists())
            {
                session()->flash('message','Đã Được Thêm Vào Danh Sách Yêu Thích Rồi');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Đã Được Thêm Vào Danh Sách Yêu Thích Rồi',
                    'type' => 'warning',
                    'trangthai' => 409
                ]);
                return false;
            }
            else
            {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'sanpham_id' => $sanphamId
                ]);
                $this->emit('wishlistAddedUpdated');
                session()->flash('message','Danh Sách Yêu Thích Đã Thêm Thành Công');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Danh Sách Yêu Thích Đã Thêm Thành Công',
                    'type' => 'success',
                    'trangthai' => 200
                ]);
            }    
        }
        else
        {
            session()->flash('message','Hãy đăng nhập để tiếp tục');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Hãy đăng nhập để tiếp tục',
                'type' => 'info',
                'trangthai' => 401
            ]);
            return false;
        }
    }

    public function huongviSelected($sanphamHuongviId)
    {
        // dd($sanphamHuongviId);
        $this->sanphamHuongviId = $sanphamHuongviId;
        $sanphamHuongVi = $this->sanpham->sanphamHuongVis()->where('id',$sanphamHuongviId)->first();
        $this->sanphamHuongViSelectedSoluong = $sanphamHuongVi->soluong;

        if($this->sanphamHuongViSelectedSoluong == 0){
            $this->sanphamHuongViSelectedSoluong = 'Hết Hàng';
        }
    }

    public function kichthuocSelected($sanphamKichthuocId)
    {
        // dd($sanphamKichthuocId);
        $this->sanphamKichthuocId = $sanphamKichthuocId;
        $sanphamKichthuoc = $this->sanpham->sanphamKichthuocs()->where('id',$sanphamKichthuocId)->first();
        $this->sanphamKichthuocSelectedSoluong = $sanphamKichthuoc->soluong;

        if($this->sanphamKichthuocSelectedSoluong == 0){
            $this->sanphamKichthuocSelectedSoluong = 'Hết Hàng';
        }
    }

    public function incrementSoluong()
    {
        if($this->quantityCount <10){
            $this->quantityCount++;
        }
       
    }

    public function decrementSoluong()
    {
        if($this->quantityCount > 1){
            $this->quantityCount--;
        }
    }

    public function addToCart(int $sanphamId)
    {
        if(Auth::check())
        {
            // dd($sanphamId);
            if($this->sanpham->where('id',$sanphamId)->where('trangthai','0')->exists())
            {
                //Kiểm tra hương vị sản phẩm và thêm vào giỏ hàng
                if($this->sanpham->sanphamHuongVis()->count() > 1 && $this->sanpham->sanphamKichthuocs()->count() > 1)
                {
                    if($this->sanphamHuongViSelectedSoluong != NULL && $this->sanphamKichthuocSelectedSoluong != NULL)
                    {
                        if(Giohang::where('user_id',auth()->user()->id)
                                    ->where('sanpham_id',$sanphamId)
                                    ->where('sanpham_huongvi_id',$this->sanphamHuongviId)
                                    ->where('sanpham_kichthuoc_id',$this->sanphamKichthuocId)
                                    ->exists())
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Sản phẩm Đã Được Thêm Rồi',
                                'type' => 'warning',
                                'trangthai' => 200
                            ]);
                        }
                        else
                        {
                            $sanphamHuongVi = $this->sanpham->sanphamHuongVis()->where('id',$this->sanphamHuongviId)->first();
                            $sanphamKichthuoc = $this->sanpham->sanphamKichthuocs()->where('id',$this->sanphamKichthuocId)->first();
                            if($sanphamHuongVi->soluong > 0 && $sanphamKichthuoc->soluong > 0)
                            {
                                if($sanphamHuongVi->soluong > $this->quantityCount && $sanphamKichthuoc->soluong > $this->quantityCount)
                                {
                                    // Thêm Sản Phẩm Vào giỏ hàng
                                    Giohang::create([
                                       'user_id' =>auth()->user()->id,
                                       'sanpham_id' => $sanphamId,
                                       'sanpham_huongvi_id' => $this->sanphamHuongviId,
                                       'sanpham_kichthuoc_id'=>$this->sanphamKichthuocId,
                                        'soluong' => $this->quantityCount
                                    ]);

                                    $this->emit('CartAddedUpdated');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Sản Phẩm Đã Được Thêm Vào Giỏ Hàng',
                                        'type' => 'success',
                                     'trangthai' => 200
                                    ]);
                                }
                                else
                                {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Chỉ '.$sanphamHuongVi->soluong.' Số lượng có sẵn','Chỉ '.$sanphamKichthuoc->soluong.' Số lượng có sẵn',
                                        'type' => 'warning',
                                        'trangthai' => 404
                                    ]);
                                }

                            }else{
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Hết Hàng',
                                    'type' => 'warning',
                                    'trangthai' => 404
                                ]);
                            }
                        }
                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Chọn Hương Vị Bạn Muốn',
                            'type' => 'info',
                            'trangthai' => 404
                        ]);

                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Chọn Kích Thước Bạn Muốn',
                            'type' => 'info',
                            'trangthai' => 404
                        ]);
                    }
                }


                else
                {        
                    if(Giohang::where('user_id',auth()->user()->id)->where('sanpham_id',$sanphamId)->exists())
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Sản phẩm Đã Được Thêm Rồi',
                            'type' => 'warning',
                            'trangthai' => 200
                        ]);
                    }      

                    else
                    {
  
                        if($this->sanpham->soluong > 0)
                        {
                            if($this->sanpham->soluong > $this->quantityCount)
                            { 
                                // Thêm Sản Phẩm Vào giỏ hàng
                                Giohang::create([
                                    'user_id' =>auth()->user()->id,
                                    'sanpham_id' => $sanphamId,
                                     'soluong' => $this->quantityCount
                               ]);
                               
                               $this->emit('CartAddedUpdated');
                               $this->dispatchBrowserEvent('message', [
                                 'text' => 'Sản Phẩm Đã Được Thêm Vào Giỏ Hàng',
                                 'type' => 'success',
                                 'trangthai' => 200
                              ]);
                            }
                            else
                            {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Chỉ '.$this->sanpham->soluong.'Số lượng có sẵn',
                                    'type' => 'warning',
                                    'trangthai' => 404
                                ]);
                            }
                        }

                        else
                         {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Hết Hàng',
                                'type' => 'warning',
                                'trangthai' => 404
                            ]);
                        }
                    }
                }
            }

            else
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Sản phẩm không tồn tại',
                    'type' => 'warning',
                    'trangthai' => 404
                ]);
            }
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Hãy đăng nhập để thêm vào giỏ hàng',
                'type' => 'info',
                'trangthai' => 401
            ]);
        }
    }

    public function mount($loaisp, $sanpham)
    {
        $this->loaisp = $loaisp;
        $this->sanpham = $sanpham;
    }


    public function render()
    {
        return view('livewire.frontend.sanpham.view',[
            'loaisp' => $this->loaisp,
            'sanpham' => $this->sanpham
        ]);
    }
}
