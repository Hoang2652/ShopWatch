<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idsanphamdecu
 * @property int    $idsanpham
 * @property int    $idsanphamdecu
 * @property int    $idsanpham
 * @property string $tensanphamdecu
 * @property string $tensanphamdecu
 */
class Sanphamdecu extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sanphamdecu';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idsanphamdecu';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idsanpham', 'idsanpham', 'tensanphamdecu', 'tensanphamdecu'
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
        'idsanphamdecu' => 'int', 'idsanpham' => 'int', 'idsanphamdecu' => 'int', 'idsanpham' => 'int', 'tensanphamdecu' => 'string', 'tensanphamdecu' => 'string'
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
