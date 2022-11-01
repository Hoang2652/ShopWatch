<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idhoadonnhapxuatkho
 * @property int    $idhoadonnhapxuatkho
 * @property string $tendoitac
 * @property string $dienthoai
 * @property string $email
 * @property string $diachinhapkho
 * @property string $diachixuatkho
 * @property string $loaihoadon
 * @property string $trangthai
 * @property string $tendoitac
 * @property string $dienthoai
 * @property string $email
 * @property string $diachinhapkho
 * @property string $diachixuatkho
 * @property string $loaihoadon
 * @property string $trangthai
 * @property Date   $ngaynhapxuat
 * @property Date   $ngaynhapxuat
 */
class Hoadonnhapxuatkho extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hoadonnhapxuatkho';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idhoadonnhapxuatkho';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tendoitac', 'dienthoai', 'email', 'diachinhapkho', 'diachixuatkho', 'ngaynhapxuat', 'loaihoadon', 'trangthai', 'tendoitac', 'dienthoai', 'email', 'diachinhapkho', 'diachixuatkho', 'ngaynhapxuat', 'loaihoadon', 'trangthai'
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
        'idhoadonnhapxuatkho' => 'int', 'idhoadonnhapxuatkho' => 'int', 'tendoitac' => 'string', 'dienthoai' => 'string', 'email' => 'string', 'diachinhapkho' => 'string', 'diachixuatkho' => 'string', 'ngaynhapxuat' => 'date', 'loaihoadon' => 'string', 'trangthai' => 'string', 'tendoitac' => 'string', 'dienthoai' => 'string', 'email' => 'string', 'diachinhapkho' => 'string', 'diachixuatkho' => 'string', 'ngaynhapxuat' => 'date', 'loaihoadon' => 'string', 'trangthai' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'ngaynhapxuat', 'ngaynhapxuat'
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
