<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'donhang';

    public function getAllOrders(){
        $orders = DB::select('SELECT tb1.*, tb2.HoVaTen, tb2.Email FROM '.$this->table.' tb1 JOIN taikhoan tb2
        on tb1.MaTK = tb2.MaTK');

        return $orders;
    }

    public function getDetail($id){
        return DB::select('SELECT tb1.*, tb2.HoVaTen, tb2.Email FROM '.$this->table.' tb1 JOIN taikhoan tb2
        on tb1.MaTK = tb2.MaTK WHERE MaDonHang=?', [$id]);
    }

    public function getProductsInOrder($id){
        return DB::select('SELECT tb1.*, tb2.Size, tb3.TenSP FROM chitietdonhang tb1 JOIN chitietsanpham tb2 
        on tb1.ChiTietSPID = tb2.ChiTietSPID JOIN sanpham tb3 on tb2.MaSP = tb3.MaSP
        WHERE tb1.MaDonHang=?', [$id]);
    }

    public function deleteOrder($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE MaDonHang=?', [$id]);
    }
}
