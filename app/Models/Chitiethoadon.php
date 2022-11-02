<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idchitiethoadon
 * @property int    $idhoadon
 * @property int    $idsanpham
 * @property int    $gia
 * @property int    $soluong
 * @property int    $giamgia
 * @property int    $created_at
 * @property int    $updated_at
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
    protected $primaryKey = 'idchitiethoadon';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idhoadon', 'idsanpham', 'tensanpham', 'gia', 'soluong', 'giamgia', 'quatang', 'created_at', 'updated_at'
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
        'idchitiethoadon' => 'int', 'idhoadon' => 'int', 'idsanpham' => 'int', 'tensanpham' => 'string', 'gia' => 'int', 'soluong' => 'int', 'giamgia' => 'int', 'quatang' => 'string', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
