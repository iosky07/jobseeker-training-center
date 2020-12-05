<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property integer $id
 * @property integer $id_tester
 * @property string $schedule
 * @property string $tester_name
 */
class Interview extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['tester_id', 'date', 'time', 'quota', 'tester_name','media','info'];

    public function tester()
    {
        return $this->belongsTo('App\Models\Tester');
    }

    public static function search($query)
    {
//        return empty($query) ? static::query()->whereVerification('yes')->whereHas('tester', function($q) {$q->whereUserId(Auth::user()->id);})
//        : static::whereVerification('yes')->where(function ($q) use ($query) {
//            $q->where('name', 'like', '%'.$query.'%');
//        });
        return empty($query) ? static::query()->whereVerification('yes')
            : static::whereVerification('yes')->where(function ($q) use ($query) {
                $q->where('name', 'like', '%'.$query.'%');
            });
    }

    public static function searchVerification($query)
    {
        return empty($query) ? static::query()->whereVerification('no')
            : static::whereVerification('no')->where(function ($q) use ($query) {
                $q->where('name', 'like', '%'.$query.'%');
            });
    }
}
