<?php

namespace App\Http\Livewire\Frontend\Thanhtoan;

use Livewire\Component;
use App\Models\Giohang;
use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Support\Str;

class ThanhtoanShow extends Component
{
    public $giohangs, $tongGiaTien = 0;

    public $fullname, $email, $phone, $pincode, $diachi ,$thanhtoan_mode = NULL, $thanhtoan_id = NULL;

    protected $listeners = [
        'validationForAll',
        'transactionEmit' => 'paidOnlineOrder'
    ];

    public function paidOnlineOrder($value)
    {
        $this->thanhtoan_id = $value;
        $this->thanhtoan_mode = 'Paid by Paypal';
        
        $codOrder = $this->placeOrder();
        if($codOrder){

            Giohang::where('user_id', auth()->user()->id)->delete();

            session()->flash('message','Đặt Hàng Thành Công' );
            $this->dispatchBrowserEvent('message', [
                'text' => 'Đặt Hàng Thành Công',
                'type' => 'success',
                'trangthai' => 200
             ]);
             return redirect()->to('thank-you');
        }else{

            $this->dispatchBrowserEvent('message', [
                'text' => 'Đã Xảy Ra Sự Cố',
                'type' => 'error',
                'trangthai' => 500
             ]);
        }
    }

    public function validationForAll()
    {
        $this->validate();
    }

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            // 'pincode' => 'required|string|max:6|min:6',
            'diachi' => 'required|string|max:500',
        ];
    }

    public function placeOrder()
    {
        $this->validate();

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'WebAnVat-'.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            // 'pincode' => $this->pincode,
            'diachi' => $this->diachi,
            'status_message' => 'trong tiến trình',
            'thanhtoan_mode' => $this->thanhtoan_mode,
            'thanhtoan_id' => $this->thanhtoan_id
        ]);

        foreach ($this->giohangs as $giohangItem) {

            $orderItems = Orderitem::create([
                'order_id' => $order->id,
                'sanpham_id' => $giohangItem->sanpham_id,
                'sanpham_huongvi_id' => $giohangItem->sanpham_huongvi_id,
                'sanpham_kichthuoc_id' => $giohangItem->sanpham_kichthuoc_id,
                'soluong' => $giohangItem->soluong,
                'gia' => $giohangItem->sanpham->selling_gia
            ]);

            if($giohangItem->sanpham_huongvi_id !=NULL && $giohangItem->sanpham_kichthuoc_id != NULL){

                $giohangItem->sanphamHuongVi()->where('id',$giohangItem->sanpham_huongvi_id)->decrement('soluong',$giohangItem->soluong);
                $giohangItem->sanphamKichthuoc()->where('id',$giohangItem->sanpham_kichthuoc_id)->decrement('soluong',$giohangItem->soluong);
            }else{

                $giohangItem->sanpham()->where('id',$giohangItem->sanpham_id)->decrement('soluong',$giohangItem->soluong);
                
            }
        } 

        return $order ;
    }

    public function codOrder()
    {
        $this->thanhtoan_mode = 'Thanh Toán Khi Nhận Hàng';
        $codOrder = $this->placeOrder();
        if($codOrder){

            Giohang::where('user_id', auth()->user()->id)->delete();

            session()->flash('message','Đặt Hàng Thành Công' );
            $this->dispatchBrowserEvent('message', [
                'text' => 'Đặt Hàng Thành Công',
                'type' => 'success',
                'trangthai' => 200
             ]);
             return redirect()->to('thank-you');
        }else{

            $this->dispatchBrowserEvent('message', [
                'text' => 'Đã Xảy Ra Sự Cố',
                'type' => 'error',
                'trangthai' => 500
             ]);
        }
      
    }

    public function tongGiaTien()
    {
        $this->tongGiaTien = 0;
        $this->giohangs = Giohang::where('user_id', auth()->user()->id)->get();
        foreach ($this->giohangs as $giohangItem) {
            $this->tongGiaTien += $giohangItem->sanpham->selling_gia * $giohangItem->soluong;
        }
        return $this->tongGiaTien;
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        $this->tongGiaTien = $this->tongGiaTien();
        return view('livewire.frontend.thanhtoan.thanhtoan-show',[
            'tongGiaTien' => $this->tongGiaTien
        ]);
    }
}
