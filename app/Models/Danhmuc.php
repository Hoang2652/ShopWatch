<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $iddanhmuc
 * @property int    $updated_at
 * @property int    $created_at
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
    protected $primaryKey = 'iddanhmuc';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tendanhmuc', 'loaidanhmuc', 'mota', 'updated_at', 'created_at'
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
        'iddanhmuc' => 'int', 'tendanhmuc' => 'string', 'loaidanhmuc' => 'string', 'mota' => 'string', 'updated_at' => 'timestamp', 'created_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'updated_at', 'created_at'
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
