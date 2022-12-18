<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idkhohang
 * @property string $tenkhohang
 * @property string $diachikhohang
 * @property string $ghichu
 * @property Date   $created_at
 */
class Khohang extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'khohang';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idkhohang';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tenkhohang', 'diachikhohang', 'created_at', 'ghichu'
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
        'idkhohang' => 'int', 'tenkhohang' => 'string', 'diachikhohang' => 'string', 'created_at' => 'date', 'ghichu' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at'
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
