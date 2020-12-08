<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $company
 * @property string $deadline
 * @property string $link_info
 * @property string $detail_info
 * @property string $thumbnail
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class JobArticle extends Model
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
    protected $fillable = ['title', 'company', 'deadline', 'link_info', 'detail_info', 'thumbnail', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('company', 'like', '%'.$query.'%');
    }
}
