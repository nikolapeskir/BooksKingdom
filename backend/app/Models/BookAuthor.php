<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    use HasFactory;
    use BelongsToUser;

    protected $guarded = [];

    public static function filterable(): array
    {
        return [
            'name',
        ];
    }

    public static function sortable(): array
    {
        return [
            'id',
            'name',
            'updated_at',
            'created_at',
        ];
    }
}
