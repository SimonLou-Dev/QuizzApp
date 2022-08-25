<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerOption extends Model
{

    protected $fillable = [
        'answer_id',
        'linked_option',
        'content',
        'point',
        'selected',
    ];

    protected $hidden = ['updated_at', 'answer_id', 'linked_option'];


    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    public function linked_option()
    {
        return $this->belongsTo(AnswerOption::class, 'linked_option');
    }
}
