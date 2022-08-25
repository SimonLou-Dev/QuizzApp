<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{

    use Uuid;

    protected $fillable = ['topic_try_id', 'question_id', 'point'];
    protected $hidden= ['topic_try_id', 'question_id', 'updated_at'];

    public function topicTry(): BelongsTo
    {
        return $this->belongsTo(TopicTry::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

}
