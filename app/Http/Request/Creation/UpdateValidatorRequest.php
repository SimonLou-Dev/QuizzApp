<?php

namespace App\Http\Request\Creation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateValidatorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'random_order' =>  ["required", "extended_boolean"],
            'display_result' => 'required|extended_boolean',
            'timed' => ['required', Rule::in('false', 'question', 'topic')],
            'correction_available' => 'required|date_format:Y-m-d H:i',
            'can_retry' => 'required|extended_boolean',
            'negative_point' => 'required|extended_boolean',
            "ended_at" => 'required|date_format:Y-m-d H:i',
            "timer"=> 'required|integer',
            'public' => 'required|extended_boolean',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
