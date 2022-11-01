<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id_hdct
 * @property int    $id_hdct
 * @property int    $idchitiethoadon
 * @property int    $idchitiethoadon
 * @property int    $soluong
 * @property int    $gia
 * @property int    $phuongthucthanhtoan
 * @property int    $soluong
 * @property int    $gia
 * @property int    $phuongthucthanhtoan
 * @property int    $idhoadon
 * @property int    $idsanpham
 * @property int    $gia
 * @property int    $soluong
 * @property int    $giamgia
 * @property int    $idhoadon
 * @property int    $idsanpham
 * @property int    $gia
 * @property int    $soluong
 * @property int    $giamgia
 * @property string $mahd
 * @property string $tensp
 * @property string $mahd
 * @property string $tensp
 * @property string $tensanpham
 * @property string $quatang
 * @property string $tensanpham
 * @property string $quatang
 */
class Chitiethoadon extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chitiethoadon';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_hdct';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idchitiethoadon', 'idchitiethoadon', 'mahd', 'tensp', 'soluong', 'gia', 'phuongthucthanhtoan', 'mahd', 'tensp', 'soluong', 'gia', 'phuongthucthanhtoan', 'idhoadon', 'idsanpham', 'tensanpham', 'gia', 'soluong', 'giamgia', 'quatang', 'idhoadon', 'idsanpham', 'tensanpham', 'gia', 'soluong', 'giamgia', 'quatang'
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
        'id_hdct' => 'int', 'id_hdct' => 'int', 'idchitiethoadon' => 'int', 'idchitiethoadon' => 'int', 'mahd' => 'string', 'tensp' => 'string', 'soluong' => 'int', 'gia' => 'int', 'phuongthucthanhtoan' => 'int', 'mahd' => 'string', 'tensp' => 'string', 'soluong' => 'int', 'gia' => 'int', 'phuongthucthanhtoan' => 'int', 'idhoadon' => 'int', 'idsanpham' => 'int', 'tensanpham' => 'string', 'gia' => 'int', 'soluong' => 'int', 'giamgia' => 'int', 'quatang' => 'string', 'idhoadon' => 'int', 'idsanpham' => 'int', 'tensanpham' => 'string', 'gia' => 'int', 'soluong' => 'int', 'giamgia' => 'int', 'quatang' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        
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
