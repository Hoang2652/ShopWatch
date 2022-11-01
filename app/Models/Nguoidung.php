<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int     $idnd
 * @property int     $idnd
 * @property int     $idnguoidung
 * @property int     $phanquyen
 * @property int     $dienthoai
 * @property int     $phanquyen
 * @property int     $phanquyen
 * @property int     $created_at
 * @property int     $updated_at
 * @property int     $phanquyen
 * @property string  $tennd
 * @property string  $username
 * @property string  $password
 * @property string  $gioitinh
 * @property string  $email
 * @property string  $dienthoai
 * @property string  $diachi
 * @property string  $tennd
 * @property string  $username
 * @property string  $password
 * @property string  $gioitinh
 * @property string  $email
 * @property string  $diachi
 * @property string  $tennguoidung
 * @property string  $tendangnhap
 * @property string  $matkhau
 * @property string  $gioitinh
 * @property string  $email
 * @property string  $dienthoai
 * @property string  $diachi
 * @property string  $remember_token
 * @property string  $tennguoidung
 * @property string  $tendangnhap
 * @property string  $matkhau
 * @property string  $gioitinh
 * @property string  $email
 * @property string  $dienthoai
 * @property string  $diachi
 * @property Date    $ngaysinh
 * @property Date    $ngaydangky
 * @property Date    $ngaysinh
 * @property Date    $ngaydangky
 * @property Date    $ngaysinh
 * @property Date    $ngaydangky
 * @property Date    $ngaysinh
 * @property Date    $ngaydangky
 * @property boolean $trangthai
 * @property boolean $trangthai
 * @property boolean $trangthai
 */
class Nguoidung extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nguoidung';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idnd';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idnguoidung', 'idnguoidung', 'tennd', 'username', 'password', 'ngaysinh', 'gioitinh', 'email', 'dienthoai', 'diachi', 'ngaydangky', 'phanquyen', 'trangthai', 'tennd', 'username', 'password', 'ngaysinh', 'gioitinh', 'email', 'dienthoai', 'diachi', 'ngaydangky', 'phanquyen', 'tennguoidung', 'tendangnhap', 'matkhau', 'ngaysinh', 'gioitinh', 'email', 'dienthoai', 'diachi', 'ngaydangky', 'phanquyen', 'trangthai', 'remember_token', 'created_at', 'updated_at', 'tennguoidung', 'tendangnhap', 'matkhau', 'ngaysinh', 'gioitinh', 'email', 'dienthoai', 'diachi', 'ngaydangky', 'phanquyen', 'trangthai'
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
        'idnd' => 'int', 'idnd' => 'int', 'idnguoidung' => 'int', 'tennd' => 'string', 'username' => 'string', 'password' => 'string', 'ngaysinh' => 'date', 'gioitinh' => 'string', 'email' => 'string', 'dienthoai' => 'string', 'diachi' => 'string', 'ngaydangky' => 'date', 'phanquyen' => 'int', 'trangthai' => 'boolean', 'tennd' => 'string', 'username' => 'string', 'password' => 'string', 'ngaysinh' => 'date', 'gioitinh' => 'string', 'email' => 'string', 'dienthoai' => 'int', 'diachi' => 'string', 'ngaydangky' => 'date', 'phanquyen' => 'int', 'tennguoidung' => 'string', 'tendangnhap' => 'string', 'matkhau' => 'string', 'ngaysinh' => 'date', 'gioitinh' => 'string', 'email' => 'string', 'dienthoai' => 'string', 'diachi' => 'string', 'ngaydangky' => 'date', 'phanquyen' => 'int', 'trangthai' => 'boolean', 'remember_token' => 'string', 'created_at' => 'timestamp', 'updated_at' => 'timestamp', 'tennguoidung' => 'string', 'tendangnhap' => 'string', 'matkhau' => 'string', 'ngaysinh' => 'date', 'gioitinh' => 'string', 'email' => 'string', 'dienthoai' => 'string', 'diachi' => 'string', 'ngaydangky' => 'date', 'phanquyen' => 'int', 'trangthai' => 'boolean'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'ngaysinh', 'ngaydangky', 'ngaysinh', 'ngaydangky', 'ngaysinh', 'ngaydangky', 'created_at', 'updated_at', 'ngaysinh', 'ngaydangky'
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
