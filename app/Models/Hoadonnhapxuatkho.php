<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int      $idhoadonnhapxuatkho
 * @property int      $updated_at
 * @property string   $tendoitac
 * @property string   $dienthoai
 * @property string   $email
 * @property string   $diachinhapkho
 * @property string   $diachixuatkho
 * @property string   $loaihoadon
 * @property string   $trangthai
 * @property DateTime $created_at
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
        'tendoitac', 'dienthoai', 'email', 'diachinhapkho', 'diachixuatkho', 'created_at', 'loaihoadon', 'trangthai', 'updated_at'
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
        'idhoadonnhapxuatkho' => 'int', 'tendoitac' => 'string', 'dienthoai' => 'string', 'email' => 'string', 'diachinhapkho' => 'string', 'diachixuatkho' => 'string', 'created_at' => 'datetime', 'loaihoadon' => 'string', 'trangthai' => 'string', 'updated_at' => 'timestamp'
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
