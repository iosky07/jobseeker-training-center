<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $question_detail_id
 * @property int $user_id
 * @property int $number
 * @property string $answer
 * @property string $created_at
 * @property string $updated_at
 * @property QuestionDetail $questionDetail
 */
class QuestionSubmit extends Model
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
    protected $fillable = ['question_detail_id', 'user_id', 'number', 'answer', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function questionDetail()
    {
        return $this->belongsTo('App\Models\QuestionDetail');
    }
}
