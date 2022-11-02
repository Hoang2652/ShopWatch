<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idtintuc
 * @property int    $created_at
 * @property int    $trangthai
 * @property int    $updated_at
 * @property string $tieude
 * @property string $noidungngan
 * @property string $noidungchitiet
 * @property string $hinhanh
 * @property string $tacgia
 */
class Tintuc extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tintuc';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idtintuc';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tieude', 'noidungngan', 'noidungchitiet', 'hinhanh', 'created_at', 'tacgia', 'trangthai', 'updated_at'
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
        'idtintuc' => 'int', 'tieude' => 'string', 'noidungngan' => 'string', 'noidungchitiet' => 'string', 'hinhanh' => 'string', 'created_at' => 'timestamp', 'tacgia' => 'string', 'trangthai' => 'int', 'updated_at' => 'timestamp'
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
