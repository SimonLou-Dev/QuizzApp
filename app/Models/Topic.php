<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{

    use Uuid, HasFactory, SoftDeletes;

    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'id', 'validated_by', 'user_id', 'user'];

    protected $appends = ['author'];

    protected $fillable = ['title', 'code', 'description', 'max_note', 'success_rate', 'nbr_question', 'random_order', 'display_result', 'timed', 'timer', 'correction_available', 'can_retry', 'negative_point', 'user_id', 'public', 'validate', 'validated_by', 'ended_at'];

    protected function author(): Attribute
    {
        return new Attribute(
            get: fn () => $this->user,
        );
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
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
