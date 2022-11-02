<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idhotro
 * @property int    $dienthoai
 * @property int    $created_at
 * @property int    $updated_at
 * @property string $chude
 * @property string $noidung
 * @property string $hoten
 * @property string $email
 */
class Hotro extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hotro';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idhotro';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chude', 'noidung', 'hoten', 'dienthoai', 'email', 'created_at', 'updated_at'
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
        'idhotro' => 'int', 'chude' => 'string', 'noidung' => 'string', 'hoten' => 'string', 'dienthoai' => 'int', 'email' => 'string', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
