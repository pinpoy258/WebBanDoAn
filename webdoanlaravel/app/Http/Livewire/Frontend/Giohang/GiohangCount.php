<?php

namespace App\Http\Livewire\Frontend\Giohang;

use App\Models\Giohang;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class GiohangCount extends Component
{
    public $giohangCount;

    protected $listeners = ['CartAddedUpdated' => 'checkGiohangCount'];

    public function checkGiohangCount()
    {
        if(Auth::check()){
            return $this->giohangCount = Giohang::where('user_id',auth()->user()->id)->count();
        }else{
            return $this->giohangCount = 0;
        }
    }

    public function render()
    {
        $this->giohangCount = $this->checkGiohangCount();
        return view('livewire.frontend.giohang.giohang-count',[
            'giohangCount' => $this->giohangCount
        ]);
    }
}
