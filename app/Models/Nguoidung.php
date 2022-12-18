<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property string  $tennguoidung
 * @property string  $tendangnhap
 * @property string  $matkhau
 * @property string  $gioitinh
 * @property string  $email
 * @property string  $dienthoai
 * @property string  $diachi
 * @property string  $remember_token
 * @property Date    $ngaysinh
 * @property int     $created_at
 * @property string     $phanquyen
 * @property int     $updated_at
 * @property boolean $trangthai
 */
class Nguoidung extends Authenticatable
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
    protected $primaryKey = 'idnguoidung';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tennguoidung', 'tendangnhap', 'matkhau', 'ngaysinh', 'gioitinh', 'email', 'dienthoai', 'diachi', 'created_at', 'phanquyen', 'trangthai', 'remember_token', 'updated_at'
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
        'tennguoidung' => 'string', 'tendangnhap' => 'string', 'matkhau' => 'string', 'ngaysinh' => 'date', 'gioitinh' => 'string', 'email' => 'string', 'dienthoai' => 'string', 'diachi' => 'string', 'created_at' => 'timestamp', 'phanquyen' => 'string', 'trangthai' => 'boolean', 'remember_token' => 'string', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'ngaysinh', 'created_at', 'updated_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    public function getAuthPassword(){
        return $this->matkhau;
    }
    // Relations ...
}
