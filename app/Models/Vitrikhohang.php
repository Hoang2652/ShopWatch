<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idvitrikhohang
 * @property int    $idkhohang
 * @property string $tenvitrikhohang
 */
class Vitrikhohang extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vitrikhohang';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idvitrikhohang';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tenvitrikhohang', 'idkhohang'
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
        'idvitrikhohang' => 'int', 'tenvitrikhohang' => 'string', 'idkhohang' => 'int'
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
