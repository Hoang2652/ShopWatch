<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $mahd
 * @property int    $mahd
 * @property int    $idhoadon
 * @property int    $idhoadon
 * @property int    $idnd
 * @property int    $trangthai
 * @property int    $idnd
 * @property int    $dienthoai
 * @property int    $trangthai
 * @property int    $idnguoidung
 * @property int    $phuongthucthanhtoan
 * @property int    $trangthai
 * @property int    $idnguoidung
 * @property int    $phuongthucthanhtoan
 * @property int    $trangthai
 * @property string $hoten
 * @property string $diachi
 * @property string $dienthoai
 * @property string $email
 * @property string $hoten
 * @property string $diachi
 * @property string $email
 * @property string $hoten
 * @property string $diachi
 * @property string $dienthoai
 * @property string $email
 * @property string $hoten
 * @property string $diachi
 * @property string $dienthoai
 * @property string $email
 * @property Date   $ngaydathang
 * @property Date   $ngaydathang
 * @property Date   $ngaydathang
 * @property Date   $ngaydathang
 */
class Hoadon extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hoadon';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'mahd';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idhoadon', 'idhoadon', 'idnd', 'hoten', 'diachi', 'dienthoai', 'email', 'ngaydathang', 'trangthai', 'idnd', 'hoten', 'diachi', 'dienthoai', 'email', 'ngaydathang', 'trangthai', 'idnguoidung', 'hoten', 'diachi', 'dienthoai', 'email', 'ngaydathang', 'phuongthucthanhtoan', 'trangthai', 'idnguoidung', 'hoten', 'diachi', 'dienthoai', 'email', 'ngaydathang', 'phuongthucthanhtoan', 'trangthai'
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
        'mahd' => 'int', 'mahd' => 'int', 'idhoadon' => 'int', 'idhoadon' => 'int', 'idnd' => 'int', 'hoten' => 'string', 'diachi' => 'string', 'dienthoai' => 'string', 'email' => 'string', 'ngaydathang' => 'date', 'trangthai' => 'int', 'idnd' => 'int', 'hoten' => 'string', 'diachi' => 'string', 'dienthoai' => 'int', 'email' => 'string', 'ngaydathang' => 'date', 'trangthai' => 'int', 'idnguoidung' => 'int', 'hoten' => 'string', 'diachi' => 'string', 'dienthoai' => 'string', 'email' => 'string', 'ngaydathang' => 'date', 'phuongthucthanhtoan' => 'int', 'trangthai' => 'int', 'idnguoidung' => 'int', 'hoten' => 'string', 'diachi' => 'string', 'dienthoai' => 'string', 'email' => 'string', 'ngaydathang' => 'date', 'phuongthucthanhtoan' => 'int', 'trangthai' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'ngaydathang', 'ngaydathang', 'ngaydathang', 'ngaydathang'
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
