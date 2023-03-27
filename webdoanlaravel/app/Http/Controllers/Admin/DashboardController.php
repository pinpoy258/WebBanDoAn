<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sanpham;
use App\Models\Loaisp;
use App\Models\Nhacungcap;
use App\Models\User;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $tongSanphams = Sanpham::count();
        $tongLoaisps = Loaisp::count();
        $tongNhacungcap = Nhacungcap::count();

        $tongAllUsers = User::count();
        $tongUser = User::where('role_as','0')->count();
        $tongAdmin = User::where('role_as','1')->count();

        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear =  Carbon::now()->format('Y');

        $tongOrder = Order::count();
        $todayOrder = Order::whereDate('created_at',$todayDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at',$thisMonth)->count();
        $thisYearOrder = Order::whereYear('created_at',$thisYear)->count();

        return view('admin.dashboard', compact('tongSanphams','tongLoaisps','tongNhacungcap','tongAllUsers',
                                                'tongUser','tongAdmin','tongOrder',
                                                'todayOrder','thisMonthOrder','thisYearOrder'));
    }
}
