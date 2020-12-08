<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $time_limit
 * @property string $category
 * @property string $created_at
 * @property string $updated_at
 * @property JobseekerTest[] $jobseekerTests
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
    public function jobseekerTests()
    {
        return $this->hasMany('App\Models\JobseekerTest');
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
        return empty($query) ? static::query()->whereCategory('TKD')
            : static::whereCategory('TKD')->where(function ($q) use ($query) {
                $q->where('name', 'like', '%'.$query.'%')
                    ->orWhere('email', 'like', '%'.$query.'%');
            });
    }
}
