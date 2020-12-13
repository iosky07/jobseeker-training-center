<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property integer $id
 * @property integer $interview_id
 * @property integer $user_id
 * @property string $name
 * @property string $date
 * @property string $time
 * @property string $character
 * @property string $talent
 * @property string $advantage
 * @property string $weakness
 * @property string $recommendation
 * @property string $created_at
 * @property string $updated_at
 * @property Interview $interview
 */
class InterviewScore extends Model
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
    protected $fillable = ['interview_id', 'user_id', 'name', 'date', 'time', 'character', 'talent', 'advantage', 'weakness', 'recommendation', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function interview()
    {
        return $this->belongsTo('App\Models\Interview');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%');
    }

    public static function searchPremium($query)
    {
        return empty($query) ? static::query()->whereUserId(Auth::id())
            : static::whereUserId(Auth::id())->where(function ($q) use ($query) {
                $q->where('name', 'like', '%'.$query.'%');
            });
    }
}
