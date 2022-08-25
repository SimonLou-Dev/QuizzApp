<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionOption extends Model
{
    use Uuid, SoftDeletes;

    protected $fillable = ['question_id', 'title', 'is_correct'];
    protected $hidden = ['question_id'];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
