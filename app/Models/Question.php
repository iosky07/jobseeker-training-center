<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $test_id
 * @property string $question-detail
 * @property string $key
 * @property string $created_at
 * @property string $updated_at
 * @property Test $test
 * @property Answer[] $answers
 * @property SelectedAnswer[] $selectedAnswers
 */
class Question extends Model
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
    protected $fillable = ['test_id', 'question-detail', 'key', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function test()
    {
        return $this->belongsTo('App\Models\Test');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function selectedAnswers()
    {
        return $this->hasMany('App\Models\SelectedAnswer');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('question-detail', 'key', '%'.$query.'%');
    }
}
