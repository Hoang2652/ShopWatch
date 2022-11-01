<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $matt
 * @property int    $idtintuc
 * @property int    $idtintuc
 * @property int    $trangthai
 * @property int    $trangthai
 * @property int    $trangthai
 * @property string $tieude
 * @property string $ndngan
 * @property string $noidung
 * @property string $hinhanh
 * @property string $tacgia
 * @property string $tieude
 * @property string $noidungngan
 * @property string $noidungchitiet
 * @property string $hinhanh
 * @property string $tacgia
 * @property string $tieude
 * @property string $noidungngan
 * @property string $noidungchitiet
 * @property string $hinhanh
 * @property string $tacgia
 * @property Date   $ngaydangtin
 * @property Date   $ngaydangtin
 * @property Date   $ngaydangtin
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
    protected $primaryKey = 'matt';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idtintuc', 'idtintuc', 'tieude', 'ndngan', 'noidung', 'hinhanh', 'ngaydangtin', 'tacgia', 'trangthai', 'tieude', 'noidungngan', 'noidungchitiet', 'hinhanh', 'ngaydangtin', 'tacgia', 'trangthai', 'tieude', 'noidungngan', 'noidungchitiet', 'hinhanh', 'ngaydangtin', 'tacgia', 'trangthai'
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
        'matt' => 'int', 'idtintuc' => 'int', 'idtintuc' => 'int', 'tieude' => 'string', 'ndngan' => 'string', 'noidung' => 'string', 'hinhanh' => 'string', 'ngaydangtin' => 'date', 'tacgia' => 'string', 'trangthai' => 'int', 'tieude' => 'string', 'noidungngan' => 'string', 'noidungchitiet' => 'string', 'hinhanh' => 'string', 'ngaydangtin' => 'date', 'tacgia' => 'string', 'trangthai' => 'int', 'tieude' => 'string', 'noidungngan' => 'string', 'noidungchitiet' => 'string', 'hinhanh' => 'string', 'ngaydangtin' => 'date', 'tacgia' => 'string', 'trangthai' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'ngaydangtin', 'ngaydangtin', 'ngaydangtin'
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
