<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\LaySanPham;
use App\Models\LayTheLoai;
use App\Models\LayDanhMuc;

class homeController extends Controller
{
    public function home(){
        $SanPhamList = DB::select('SELECT * FROM `sanpham` WHERE 1');
        // dd($data);
        return view("home", compact('SanPhamList'));
    }
    public function register(){
        return view('DangNhap');
    }
    public function test(){

        dd(count(Session('cart')));
    }
}
