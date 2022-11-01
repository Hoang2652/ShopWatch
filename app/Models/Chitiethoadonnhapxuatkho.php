<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idauto
 * @property int    $idauto
 * @property int    $idhoadonnhapxuatkho
 * @property int    $soluong
 * @property int    $dongia
 * @property int    $idhoadonnhapxuatkho
 * @property int    $soluong
 * @property int    $dongia
 * @property string $idsanpham
 * @property string $tensanpham
 * @property string $donvi
 * @property string $idsanpham
 * @property string $tensanpham
 * @property string $donvi
 */
class Chitiethoadonnhapxuatkho extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chitiethoadonnhapxuatkho';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idauto';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idhoadonnhapxuatkho', 'idsanpham', 'tensanpham', 'soluong', 'donvi', 'dongia', 'idhoadonnhapxuatkho', 'idsanpham', 'tensanpham', 'soluong', 'donvi', 'dongia'
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
        'idauto' => 'int', 'idauto' => 'int', 'idhoadonnhapxuatkho' => 'int', 'idsanpham' => 'string', 'tensanpham' => 'string', 'soluong' => 'int', 'donvi' => 'string', 'dongia' => 'int', 'idhoadonnhapxuatkho' => 'int', 'idsanpham' => 'string', 'tensanpham' => 'string', 'soluong' => 'int', 'donvi' => 'string', 'dongia' => 'int'
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
