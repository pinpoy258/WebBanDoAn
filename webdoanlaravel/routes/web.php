<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {

    Route::get('/' , 'index');
    Route::get('/collections' , 'loaisps');
    Route::get('/collections/{loaisp_slug}' , 'sanphams');
    Route::get('/collections/{loaisp_slug}/{sanpham_slug}' , 'sanphamView');

    Route::get('/sanpham-moi', 'sanphamMoi');
    Route::get('/sanpham-noibat', 'sanphamNoibat');

    Route::get('search','searchSanphams');
});


Route::middleware(['auth'])->group(function () {
    
    Route::get('wishlist', [App\Http\Controllers\Frontend\WishlistController::class,'index']);  
    Route::get('giohang',[App\Http\Controllers\Frontend\GiohangController::class, 'index']);
    Route::get('thanhtoan',[App\Http\Controllers\Frontend\ThanhtoanController::class, 'index']);

    Route::get('orders',[App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('orders/{orderId}',[App\Http\Controllers\Frontend\OrderController::class, 'show']);
    

    Route::get('profile',[App\Http\Controllers\Frontend\UserController::class, 'index']);
    Route::post('profile', [App\Http\Controllers\Frontend\UserController::class, 'updateUserDetails']);

    Route::get('change-password',[App\Http\Controllers\Frontend\UserController::class, 'passwordCreate']);
    Route::post('change-password',[App\Http\Controllers\Frontend\UserController::class, 'changePassword']);
});

Route::get('thank-you',[App\Http\Controllers\Frontend\FrontendController::class, 'thankyou']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    Route::get('dashboard' , [App\Http\Controllers\Admin\DashboardController::class, 'index']);


    Route::get('settings',[App\Http\Controllers\Admin\SettingController::class, 'index']);
    Route::post('settings',[App\Http\Controllers\Admin\SettingController::class, 'store']);

    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('sliders','index');
        Route::get('sliders/create','create');
        Route::post('sliders/create','store');
        Route::get('sliders/{slider}/edit', 'edit');
        Route::put('sliders/{slider}','update');
        Route::get('sliders/{slider}/delete', 'destroy');
       
    });

    //Loaisp Routes
    Route::controller(App\Http\Controllers\Admin\LoaispController::class)->group(function () {
        Route::get('/loaisp', 'index');
        Route::get('/loaisp/create', 'create');
        Route::post('/loaisp', 'store');
        Route::get('/loaisp/{loaisp}/edit', 'edit');
        Route::put('/loaisp/{loaisp}', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\SanphamController::class)->group(function () {
        Route::get('/sanphams', 'index');
        Route::get('sanphams/create','create');
        Route::post('/sanphams','store');
        Route::get('/sanphams/{sanpham}/edit','edit');
        Route::put('/sanphams/{sanpham}', 'update');
        Route::get('sanphams/{sanpham_id}/delete', 'destroy');
        Route::get('sanpham-hinhanh/{sanpham_hinhanh_id}/delete','destroyHinhanh');

        Route::post('sanpham-huongvi/{sanpham_huongvi_id}', 'updateSanphamHuongViSluong');
        Route::get('sanpham-huongvi/{sanpham_huongvi_id}/delete', 'deleteSanphamHuongVi');

        Route::post('sanpham-kichthuoc/{sanpham_kichthuoc_id}', 'updateSanphamKichthuocSluong');
        Route::get('sanpham-kichthuoc/{sanpham_kichthuoc_id}/delete', 'deleteSanphamKichthuoc');
    });    

    Route::get('/nhacungcaps',App\Http\Livewire\Admin\Nhacungcap\Index::class);
   
    Route::controller(App\Http\Controllers\Admin\HuongViController::class)->group(function () {
        Route::get('/huongvis', 'index');
        Route::get('huongvis/create','create');
        Route::post('huongvis/create','store');
        Route::get('/huongvis/{huongvi}/edit','edit');
        Route::put('/huongvis/{huongvi_id}','update');
        Route::get('/huongvis/{huongvi_id}/delete','destroy');
    });  

    Route::controller(App\Http\Controllers\Admin\KichthuocController::class)->group(function () {
        Route::get('/kichthuocs', 'index');
        Route::get('kichthuocs/create','create');
        Route::post('kichthuocs/create','store');
        Route::get('/kichthuocs/{kichthuoc}/edit','edit');
        Route::put('/kichthuocs/{kichthuoc_id}','update');
        Route::get('/kichthuocs/{kichthuoc_id}/delete','destroy');
    }); 

    //
    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderId}', 'updateOrderStatus');

        Route::get('/invoice/{orderId}', 'viewInvoice');
        Route::get('/invoice/{orderId}/generate', 'generateInvoice');
    }); 


    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/create', 'create');
        Route::post('/users', 'store');
        Route::get('/users/{user_id}/edit', 'edit');
        Route::put('users/{user_id}','update');
        Route::get('users/{user_id}/delete', 'destroy');
    }); 
});
