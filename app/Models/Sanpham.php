<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int     $idsp
 * @property int     $idsp
 * @property int     $idsanpham
 * @property int     $idsanpham
 * @property int     $soluong
 * @property int     $daban
 * @property int     $gia
 * @property int     $khuyenmai1
 * @property int     $madm
 * @property int     $trangthai
 * @property int     $soluong
 * @property int     $daban
 * @property int     $gia
 * @property int     $khuyenmai1
 * @property int     $madm
 * @property int     $trangthai
 * @property int     $baohanh
 * @property int     $soluong
 * @property int     $daban
 * @property int     $gia
 * @property int     $iddanhmuc
 * @property int     $giamgia
 * @property int     $quatang
 * @property int     $soluongkhuyenmai
 * @property int     $idhoadonnhapxuatkho
 * @property int     $idkhohang
 * @property int     $baohanh
 * @property int     $soluong
 * @property int     $daban
 * @property int     $gia
 * @property int     $iddanhmuc
 * @property int     $giamgia
 * @property int     $quatang
 * @property int     $soluongkhuyenmai
 * @property int     $idhoadonnhapxuatkho
 * @property int     $idkhohang
 * @property string  $tensp
 * @property string  $hinhanh
 * @property string  $mau
 * @property string  $chitiet
 * @property string  $khuyenmai2
 * @property string  $tensp
 * @property string  $hinhanh
 * @property string  $mau
 * @property string  $chitiet
 * @property string  $khuyenmai2
 * @property string  $tensanpham
 * @property string  $loaisanpham
 * @property string  $hinhanh
 * @property string  $mota
 * @property string  $xuatxu
 * @property string  $chitiet
 * @property string  $tensanpham
 * @property string  $loaisanpham
 * @property string  $hinhanh
 * @property string  $mota
 * @property string  $xuatxu
 * @property string  $chitiet
 * @property Date    $ngaycapnhat
 * @property Date    $ngaycapnhat
 * @property Date    $ngaycapnhat
 * @property Date    $ngaycapnhat
 * @property boolean $trangthai
 * @property boolean $trangthai
 */
class Sanpham extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sanpham';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idsp';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idsanpham', 'idsanpham', 'tensp', 'hinhanh', 'mau', 'chitiet', 'soluong', 'daban', 'gia', 'khuyenmai1', 'khuyenmai2', 'madm', 'ngaycapnhat', 'trangthai', 'tensp', 'hinhanh', 'mau', 'chitiet', 'soluong', 'daban', 'gia', 'khuyenmai1', 'khuyenmai2', 'madm', 'ngaycapnhat', 'trangthai', 'tensanpham', 'loaisanpham', 'hinhanh', 'mota', 'xuatxu', 'baohanh', 'chitiet', 'soluong', 'daban', 'gia', 'iddanhmuc', 'giamgia', 'quatang', 'soluongkhuyenmai', 'ngaycapnhat', 'trangthai', 'idhoadonnhapxuatkho', 'idkhohang', 'tensanpham', 'loaisanpham', 'hinhanh', 'mota', 'xuatxu', 'baohanh', 'chitiet', 'soluong', 'daban', 'gia', 'iddanhmuc', 'giamgia', 'quatang', 'soluongkhuyenmai', 'ngaycapnhat', 'trangthai', 'idhoadonnhapxuatkho', 'idkhohang'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idsp' => 'int', 'idsp' => 'int', 'idsanpham' => 'int', 'idsanpham' => 'int', 'tensp' => 'string', 'hinhanh' => 'string', 'mau' => 'string', 'chitiet' => 'string', 'soluong' => 'int', 'daban' => 'int', 'gia' => 'int', 'khuyenmai1' => 'int', 'khuyenmai2' => 'string', 'madm' => 'int', 'ngaycapnhat' => 'date', 'trangthai' => 'int', 'tensp' => 'string', 'hinhanh' => 'string', 'mau' => 'string', 'chitiet' => 'string', 'soluong' => 'int', 'daban' => 'int', 'gia' => 'int', 'khuyenmai1' => 'int', 'khuyenmai2' => 'string', 'madm' => 'int', 'ngaycapnhat' => 'date', 'trangthai' => 'int', 'tensanpham' => 'string', 'loaisanpham' => 'string', 'hinhanh' => 'string', 'mota' => 'string', 'xuatxu' => 'string', 'baohanh' => 'int', 'chitiet' => 'string', 'soluong' => 'int', 'daban' => 'int', 'gia' => 'int', 'iddanhmuc' => 'int', 'giamgia' => 'int', 'quatang' => 'int', 'soluongkhuyenmai' => 'int', 'ngaycapnhat' => 'date', 'trangthai' => 'boolean', 'idhoadonnhapxuatkho' => 'int', 'idkhohang' => 'int', 'tensanpham' => 'string', 'loaisanpham' => 'string', 'hinhanh' => 'string', 'mota' => 'string', 'xuatxu' => 'string', 'baohanh' => 'int', 'chitiet' => 'string', 'soluong' => 'int', 'daban' => 'int', 'gia' => 'int', 'iddanhmuc' => 'int', 'giamgia' => 'int', 'quatang' => 'int', 'soluongkhuyenmai' => 'int', 'ngaycapnhat' => 'date', 'trangthai' => 'boolean', 'idhoadonnhapxuatkho' => 'int', 'idkhohang' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'ngaycapnhat', 'ngaycapnhat', 'ngaycapnhat', 'ngaycapnhat'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    // Relations ...
}
