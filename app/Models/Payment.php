<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property int $id
 * @property integer $user_id
 * @property string $nominal
 * @property string $bank
 */
class Payment extends Model
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
    protected $fillable = ['user_id', 'user_name', 'thumbnail', 'bank'];

    public static function search($query)
    {
        return empty($query) ? static::query()->whereVerification('yes')
            : static::whereVerification('yes')->where(function ($q) use ($query) {
                $q->where('user_name', 'like', '%'.$query.'%')
                    ->orWhere('bank', 'like', '%'.$query.'%');
            });
    }

    public static function searchUser($query)
    {
        return empty($query) ? static::query()->whereVerification('no')->whereUserId(Auth::user()->id)
            : static::whereVerification('no')->where(function ($q) use ($query) {
                $q->where('user_name', 'like', '%'.$query.'%')
                    ->orWhere('bank', 'like', '%'.$query.'%');
            });
    }

    public static function searchVerification($query)
    {
        return empty($query) ? static::query()->whereVerification('no')
            : static::whereVerification('no')->where(function ($q) use ($query) {
                $q->where('user_name', 'like', '%'.$query.'%')
                    ->orWhere('bank', 'like', '%'.$query.'%');
            });
    }

}
