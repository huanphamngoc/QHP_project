<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;

    protected $table = 'sanpham';

    public function getAllProducts(){
        $products = DB::select('SELECT MaSP, TenSP, GiaBan, MoTa, HinhAnh, TenTheLoai, TenDanhMuc FROM '. $this->table . ', theloai, danhmuc
        WHERE ' . $this->table . '.MaTheLoai = theloai.MaTheLoai AND ' . $this->table . '.MaDanhMuc = danhmuc.MaDanhMuc ORDER BY MaSP');

        return $products;
    }

    public function addProduct($data){
        DB::insert('INSERT INTO '.$this->table.' (TenSP, GiaBan, MoTa, HinhAnh, MaTheLoai, MaDanhMuc)
        VALUES (?, ?, ?, ?, ?, ?)', $data);
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE MaSP = ?', [$id]);
    }

    public function updateProduct($data, $id){
        $data[] = $id;

        return DB::update('UPDATE '.$this->table.' SET 
        TenSP=?,
        GiaBan=?,
        MoTa=?,
        HinhAnh=?,
        MaTheLoai=?,
        MaDanhMuc=?
        WHERE MaSP = ?', $data);
    }

    public function deleteProduct($id){
        $deleteOK = 1;
        //Lấy ra các mã chi tiết sản phẩm tương ứng với mã sản phẩm
        $detailID = DB::select('SELECT ChiTietSPID FROM chitietsanpham WHERE MaSP=?', [$id]);
        //Kiểm tra xem có đơn hàng nào có chứa sản phẩm cần xóa hay không
        foreach($detailID as $item){
            //Lấy ra mã đơn hàng
            $orderDetail = DB::select('SELECT * FROM chitietdonhang WHERE ChiTietSPID=?', [$item->ChiTietSPID]);
            if (empty($orderDetail)){
                continue;
            } else {
                $deleteOK = 0;
                break;
            }
        }
        
        //Nếu không có đơn hàng nào có sản phẩm cần xóa thì được phép xóa sản phẩm
        if ($deleteOK == 1){
            return DB::delete('DELETE FROM '.$this->table.' WHERE MaSP=?', [$id]);
        } else {
            return False;
        }

    }

    public function searchProduct($key){
        if (is_numeric($key)){
            return DB::select('SELECT * FROM '.$this->table.' WHERE GiaBan = '.$key);
        } else {
            return DB::select('SELECT * FROM '.$this->table.' WHERE (TenSP LIKE "%'.$key.'%")');
        }
        
    }
}
