<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int     $iddanhgia
 * @property int     $iddanhgia
 * @property int     $idsanpham
 * @property int     $idnguoidung
 * @property int     $idsanpham
 * @property int     $idnguoidung
 * @property boolean $sodiem
 * @property boolean $sodiem
 * @property string  $binhluan
 * @property string  $binhluan
 * @property Date    $ngaybinhluan
 * @property Date    $ngaybinhluan
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
        'idsanpham', 'idnguoidung', 'sodiem', 'binhluan', 'ngaybinhluan', 'idsanpham', 'idnguoidung', 'sodiem', 'binhluan', 'ngaybinhluan'
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
        'iddanhgia' => 'int', 'iddanhgia' => 'int', 'idsanpham' => 'int', 'idnguoidung' => 'int', 'sodiem' => 'boolean', 'binhluan' => 'string', 'ngaybinhluan' => 'date', 'idsanpham' => 'int', 'idnguoidung' => 'int', 'sodiem' => 'boolean', 'binhluan' => 'string', 'ngaybinhluan' => 'date'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'ngaybinhluan', 'ngaybinhluan'
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
