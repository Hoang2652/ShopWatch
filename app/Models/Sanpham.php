<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @property int     $idsanpham
 * @property int     $baohanh
 * @property int     $soluong
 * @property int     $daban
 * @property int     $gia
 * @property int     $iddanhmuc
 * @property int     $giamgia
 * @property int     $quatang
 * @property int     $soluongkhuyenmai
 * @property int     $created_at
 * @property int     $idhoadonnhapxuatkho
 * @property int     $idkhohang
 * @property int     $updated_at
 * @property string  $tensanpham
 * @property string  $loaisanpham
 * @property string  $hinhanh
 * @property string  $mota
 * @property string  $xuatxu
 * @property string  $chitiet
 * @property boolean $trangthai
 */
class Sanpham extends Model
{
    use HasFactory;
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
    protected $primaryKey = 'idsanpham';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tensanpham', 'loaisanpham', 'hinhanh', 'mota', 'xuatxu', 'baohanh', 'chitiet', 'soluong', 'daban', 'gia', 'iddanhmuc', 'giamgia', 'quatang', 'soluongkhuyenmai', 'created_at', 'trangthai', 'idhoadonnhapxuatkho', 'idkhohang', 'updated_at'
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
        'idsanpham' => 'int', 'tensanpham' => 'string', 'loaisanpham' => 'string', 'hinhanh' => 'string', 'mota' => 'string', 'xuatxu' => 'string', 'baohanh' => 'int', 'chitiet' => 'string', 'soluong' => 'int', 'daban' => 'int', 'gia' => 'int', 'iddanhmuc' => 'int', 'giamgia' => 'int', 'quatang' => 'int', 'soluongkhuyenmai' => 'int', 'created_at' => 'timestamp', 'trangthai' => 'boolean', 'idhoadonnhapxuatkho' => 'int', 'idkhohang' => 'int', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
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
