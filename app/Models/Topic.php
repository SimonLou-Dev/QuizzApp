<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{

    use Uuid, HasFactory, SoftDeletes;

    protected $fillable = ['title', 'code', 'description', 'max_note', 'success_rate', 'nbr_question', 'random_order', 'display_result', 'timed', 'timer', 'correction_available', 'can_retry', 'negative_point', 'user_id', 'public', 'validate', 'validated_by', 'ended_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function validator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'validated_by', 'id');
    }

    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class);
    }

    public function tries(): BelongsToMany
    {
        return $this->belongsToMany(TopicTry::class);
    }
}
