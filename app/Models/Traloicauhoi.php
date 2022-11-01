<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idcauhoi
 * @property int    $idcauhoi
 * @property string $noidungcauhoi
 * @property string $cautraloi
 * @property string $noidungcauhoi
 * @property string $cautraloi
 * @property Date   $ngaytraloi
 * @property Date   $ngaytraloi
 */
class Traloicauhoi extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'traloicauhoi';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idcauhoi';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'noidungcauhoi', 'cautraloi', 'ngaytraloi', 'noidungcauhoi', 'cautraloi', 'ngaytraloi'
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
        'idcauhoi' => 'int', 'idcauhoi' => 'int', 'noidungcauhoi' => 'string', 'cautraloi' => 'string', 'ngaytraloi' => 'date', 'noidungcauhoi' => 'string', 'cautraloi' => 'string', 'ngaytraloi' => 'date'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'ngaytraloi', 'ngaytraloi'
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
