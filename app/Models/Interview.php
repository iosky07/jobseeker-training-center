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
    protected $fillable = ['tester_id', 'date', 'time', 'tester_name','media','info'];

    public function tester()
    {
        return $this->belongsTo('App\Models\Tester');
    }

    public function interviewScore()
    {
        return $this->HasMany('App\Models\Tester');
    }

//    public static function search($query)
//    {
////        return empty($query) ? static::query()->whereVerification('yes')->whereHas('tester', function($q) {$q->whereUserId(Auth::user()->id);})
////        : static::whereVerification('yes')->where(function ($q) use ($query) {
////            $q->where('name', 'like', '%'.$query.'%');
////        });
//        return empty($query) ? static::query()->whereVerification('yes')
//            : static::whereVerification('yes')->where(function ($q) use ($query) {
//                $q->where('name', 'like', '%'.$query.'%');
//            });
//    }

    public static function search($query)
    {
        $data = count(Interview::whereUserId(Auth::id())->get('user_id'));
//        dd($data);
        if ($data != NULL) {
            return empty($query) ? static::query()->whereUserId('nothing')
                : static::where('tester_name', 'like', '%'.$query.'%');
        }else{
            return empty($query) ? static::query()->whereUserId(NULL)
                : static::where('tester_name', 'like', '%'.$query.'%');
        }
//        return empty($query) ? static::query()->whereUserId(NULL)
//            : static::where('tester_name', 'like', '%'.$query.'%');

    }

    public static function searchChoosen($query)
    {
        return empty($query) ? static::query()->whereUserId(Auth::id())
            : static::whereUserId(Auth::id())->where(function ($q) use ($query) {
                $q->where('name', 'like', '%'.$query.'%');
            });
    }

    public static function searchHrd($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%');
    }
}
