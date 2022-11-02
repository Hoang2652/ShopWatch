<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idauto
 * @property int    $idhoadonnhapxuatkho
 * @property int    $soluong
 * @property int    $dongia
 * @property int    $created_at
 * @property int    $updated_at
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
        'idhoadonnhapxuatkho', 'idsanpham', 'tensanpham', 'soluong', 'donvi', 'dongia', 'created_at', 'updated_at'
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
        'idauto' => 'int', 'idhoadonnhapxuatkho' => 'int', 'idsanpham' => 'string', 'tensanpham' => 'string', 'soluong' => 'int', 'donvi' => 'string', 'dongia' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
