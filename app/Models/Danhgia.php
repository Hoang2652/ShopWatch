<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int     $iddanhgia
 * @property int     $idsanpham
 * @property int     $idnguoidung
 * @property int     $created_at
 * @property int     $updated_at
 * @property int $sodiem
 * @property string  $binhluan
 */
class Danhgia extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'danhgia';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'iddanhgia';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idsanpham', 'idnguoidung', 'sodiem', 'binhluan', 'created_at', 'updated_at'
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
        'iddanhgia' => 'int', 'idsanpham' => 'int', 'idnguoidung' => 'int', 'sodiem' => 'int', 'binhluan' => 'string', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
