<?php

namespace App\Http\Livewire\Frontend\Sanpham;

use Livewire\Component;
use App\Models\Sanpham;

class Index extends Component
{
    public $sanphams, $loaisp, $nhacungcapInputs = [], $priceInput;

    protected $queryString = [
        'nhacungcapInputs' => ['except' => '', 'as' => 'nhacungcap'],
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];


    public function mount($loaisp)
    {
        
        $this->loaisp = $loaisp;
    }
    public function render()
    {
        $this->sanphams = Sanpham::where('loaisp_id',$this->loaisp->id)
                            ->when($this->nhacungcapInputs, function($q){
                                $q->whereIn('nhacungcap', $this->nhacungcapInputs);
                            })
                            
                            ->when($this->priceInput, function($q){

                                $q->when($this->priceInput == 'high-to-low', function($q2){
                                        $q2->orderBy('selling_gia', 'DESC');
                                    })
                                    ->when($this->priceInput == 'low-to-high', function($q2){
                                        $q2->orderBy('selling_gia', 'ASC');
                                    });
                            })

                            ->where('trangthai','0')
                            ->get();

        return view('livewire.frontend.sanpham.index', [
            'sanphams' => $this->sanphams,
            'loaisp' => $this->loaisp
        ]);
    }
}
