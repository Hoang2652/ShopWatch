<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idht
 * @property int    $idht
 * @property int    $idhotro
 * @property int    $idhotro
 * @property int    $dienthoai
 * @property int    $dienthoai
 * @property int    $dienthoai
 * @property int    $dienthoai
 * @property string $chude
 * @property string $noidung
 * @property string $hoten
 * @property string $email
 * @property string $chude
 * @property string $noidung
 * @property string $hoten
 * @property string $email
 * @property string $chude
 * @property string $noidung
 * @property string $hoten
 * @property string $email
 * @property string $chude
 * @property string $noidung
 * @property string $hoten
 * @property string $email
 * @property Date   $ngaygui
 * @property Date   $ngaygui
 * @property Date   $ngaygui
 * @property Date   $ngaygui
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
    protected $primaryKey = 'idht';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idhotro', 'idhotro', 'chude', 'noidung', 'hoten', 'dienthoai', 'email', 'ngaygui', 'chude', 'noidung', 'hoten', 'dienthoai', 'email', 'ngaygui', 'chude', 'noidung', 'hoten', 'dienthoai', 'email', 'ngaygui', 'chude', 'noidung', 'hoten', 'dienthoai', 'email', 'ngaygui'
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
        'idht' => 'int', 'idht' => 'int', 'idhotro' => 'int', 'idhotro' => 'int', 'chude' => 'string', 'noidung' => 'string', 'hoten' => 'string', 'dienthoai' => 'int', 'email' => 'string', 'ngaygui' => 'date', 'chude' => 'string', 'noidung' => 'string', 'hoten' => 'string', 'dienthoai' => 'int', 'email' => 'string', 'ngaygui' => 'date', 'chude' => 'string', 'noidung' => 'string', 'hoten' => 'string', 'dienthoai' => 'int', 'email' => 'string', 'ngaygui' => 'date', 'chude' => 'string', 'noidung' => 'string', 'hoten' => 'string', 'dienthoai' => 'int', 'email' => 'string', 'ngaygui' => 'date'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'ngaygui', 'ngaygui', 'ngaygui', 'ngaygui'
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
