<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property integer $id
 * @property string $title
 * @property string $time_limit
 * @property string $category
 * @property string $created_at
 * @property string $updated_at
 * @property Test[] $test
 * @property QuestionDetail[] $questionDetails
 * @property QuestionScore[] $questionScores
 * @property Question[] $questions
 */
class Test extends Model
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
    protected $fillable = ['title', 'time_limit', 'category', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tests()
    {
        return $this->hasMany('App\Models\Test');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questionDetails()
    {
        return $this->hasMany('App\Models\QuestionDetail');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questionScores()
    {
        return $this->hasMany('App\Models\QuestionScore');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%'.$query.'%');
    }

    public static function searchRegularTest($query)
    {
        return empty($query) ? static::query()->whereCategory('TKD')->whereHas('questionScores')->whereUserId(Auth::id())
            : static::whereCategory('TKD')->whereHas('questionScores',function ($q) use ($query) {
                $q->whereUserId(Auth::id());
//                $q->where('name', 'like', '%'.$query.'%')
//                    ->orWhere('email', 'like', '%'.$query.'%');
            });
    }
}
