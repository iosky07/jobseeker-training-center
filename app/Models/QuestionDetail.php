<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $test_id
 * @property boolean $type
 * @property string $quest
 * @property string $a
 * @property string $b
 * @property string $c
 * @property string $d
 * @property string $e
 * @property int $value
 * @property string $created_at
 * @property string $updated_at
 * @property Test $test
 * @property QuestionSubmit[] $questionSubmits
 */
class QuestionDetail extends Model
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
    protected $fillable = ['test_id', 'type', 'quest', 'a', 'b', 'c', 'd', 'e', 'value', 'created_at', 'updated_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tests()
    {
        return $this->belongsTo('App\Models\Test');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questionSubmits()
    {
        return $this->hasMany('App\Models\QuestionSubmit');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('quest', 'like', '%'.$query.'%');
    }
}
