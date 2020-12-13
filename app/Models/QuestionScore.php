<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $test_id
 * @property int $score
 * @property int $category
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property Test $test
 * @property User $user
 */
class QuestionScore extends Model
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
    protected $fillable = ['user_id', 'test_id', 'score', 'category', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function test()
    {
        return $this->belongsTo('App\Models\Test');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()->whereUserId(Auth::user()->id)
            : static::where('tes_id', 'like', '%'.$query.'%');
    }

    public static function searchAdmin($query)
    {
        return empty($query) ? static::query()
            : static::where('tes_id', 'like', '%'.$query.'%');
    }
}
