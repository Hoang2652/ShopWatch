<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idhoadon
 * @property int    $idnguoidung
 * @property int    $created_at
 * @property int    $phuongthucthanhtoan
 * @property int    $trangthai
 * @property int    $updated_at
 * @property string $hoten
 * @property string $diachi
 * @property string $dienthoai
 * @property string $email
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
    protected $primaryKey = 'idhoadon';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idnguoidung', 'hoten', 'diachi', 'dienthoai', 'email', 'created_at', 'phuongthucthanhtoan', 'trangthai', 'updated_at'
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
        'idhoadon' => 'int', 'idnguoidung' => 'int', 'hoten' => 'string', 'diachi' => 'string', 'dienthoai' => 'string', 'email' => 'string', 'created_at' => 'timestamp', 'phuongthucthanhtoan' => 'int', 'trangthai' => 'int', 'updated_at' => 'timestamp'
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
