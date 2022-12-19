<?php

namespace App\Traits;

trait BelongsToUser
{
    protected static function bootBelongsToUser()
    {
        static::creating(function($model) {
            if (auth()->user()?->id) {
                $model->user_id = auth()->user()->id;
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
