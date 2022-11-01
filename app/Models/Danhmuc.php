<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $madm
 * @property int    $madm
 * @property int    $iddanhmuc
 * @property int    $iddanhmuc
 * @property int    $dequi
 * @property int    $dequi
 * @property string $tendm
 * @property string $tendm
 * @property string $tendanhmuc
 * @property string $loaidanhmuc
 * @property string $mota
 * @property string $tendanhmuc
 * @property string $loaidanhmuc
 * @property string $mota
 */
class Danhmuc extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'danhmuc';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'madm';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iddanhmuc', 'iddanhmuc', 'tendm', 'dequi', 'tendm', 'dequi', 'tendanhmuc', 'loaidanhmuc', 'mota', 'tendanhmuc', 'loaidanhmuc', 'mota'
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
        'madm' => 'int', 'madm' => 'int', 'iddanhmuc' => 'int', 'iddanhmuc' => 'int', 'tendm' => 'string', 'dequi' => 'int', 'tendm' => 'string', 'dequi' => 'int', 'tendanhmuc' => 'string', 'loaidanhmuc' => 'string', 'mota' => 'string', 'tendanhmuc' => 'string', 'loaidanhmuc' => 'string', 'mota' => 'string'
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
