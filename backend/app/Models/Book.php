<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    use BelongsToUser;

    protected $guarded = [];

    public function author()
    {
        return $this->hasOne(\App\Models\BookAuthor::class, 'id', 'author_id');
    }
}
