<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Uuid
{

    /**
     * Boot the uuid trait for the model.
     */
    public static function bootUuid()
    {
        static::creating(function ($model) {
            $model->id = Str::uuid()->toString();
        });
    }

    public function getCasts(): array
    {
        return array_merge([
            'id' => 'string',
        ], $this->casts);

    }



}
