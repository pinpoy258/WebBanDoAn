<?php

namespace App\Http\Livewire\Admin\Loaisp;

use App\Models\Loaisp;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $loaisp_id;

    public function deleteLoaisp($loaisp_id)
    {
        
        $this->loaisp_id = $loaisp_id;
    }
    public function destroyLoaisp()
    {
        $loaisp = Loaisp::find($this->loaisp_id);
        $path = 'uploads/loaisp/'.$loaisp->hinhanh;
        if(File::exists($path)){
            File::delete($path);
        }
        $loaisp->delete();
        session()->flash('message','Loại Sản Phẩm Đã Xóa');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function render()
    {
        $loaisps = Loaisp::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.loaisp.index',['loaisps' => $loaisps]);
    }
}
