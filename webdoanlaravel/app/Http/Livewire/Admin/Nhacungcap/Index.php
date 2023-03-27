<?php

namespace App\Http\Livewire\Admin\Nhacungcap;

use App\Models\Nhacungcap;
use App\Models\Loaisp;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tennhacungcap, $slug, $trangthai, $nhacungcap_id, $loaisp_id;

    public function rules()
    {
        return[
            'tennhacungcap' => 'required|string',
            'slug' => 'required|string',
            'loaisp_id' => 'required|integer',
            'trangthai' => 'nullable'
        ];
    }

    public function resetInput()
    {
        $this->tennhacungcap = Null;
        $this->slug = Null;
        $this->trangthai = Null;
        $this->nhacungcap_id = Null;
        $this->loaisp_id = Null;  
    }

    public function storeNhacungcap()
    {
        $validateData = $this->validate();
        Nhacungcap::create([
            'tennhacungcap' => $this ->tennhacungcap, 
            'slug' => Str::slug($this->slug), 
            'trangthai' => $this ->trangthai == true ? '1':'0', 
            'loaisp_id' => $this->loaisp_id
        ]);
        session()->flash('message','Nhà Cung Cấp Đã Được Thêm Thành Công');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function openModal()
    {
        $this->resetInput();
    }

    public function editNhacungcap(int $nhacungcap_id)
    {
        $this->nhacungcap_id = $nhacungcap_id;
        $nhacungcap = Nhacungcap::findOrFail($nhacungcap_id);
        $this->tennhacungcap = $nhacungcap->tennhacungcap;
        $this->slug = $nhacungcap->slug;
        $this->trangthai = $nhacungcap->trangthai;
        $this->loaisp_id = $nhacungcap->loaisp_id;
    }

    public function capnhatNhacungcap()
    {
        $validateData = $this->validate();
        Nhacungcap::findOrFail($this->nhacungcap_id)->update([
            'tennhacungcap' => $this ->tennhacungcap, 
            'slug' => Str::slug($this->slug), 
            'trangthai' => $this ->trangthai == true ? '1':'0',
            'loaisp_id' => $this->loaisp_id 
        ]);
        session()->flash('message','Nhà Cung Cấp Đã Được Cập Nhật Thành Công');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function xoaNhacungcap($nhacungcap_id)
    {
        $this->nhacungcap_id = $nhacungcap_id;
    }

    public function destroyNhacungcap()
    {
        Nhacungcap::findOrFail($this->nhacungcap_id)->delete();
        session()->flash('message','Nhà Cung Cấp Đã Xóa Thành Công');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function render()
    {
        $loaisps = Loaisp::where('trangthai','0')->get();
        $nhacungcaps = Nhacungcap::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.nhacungcap.index', ['nhacungcaps'=>$nhacungcaps, 'loaisps' => $loaisps])
                    ->extends('layouts.admin')
                    ->section('content');
    }
}
