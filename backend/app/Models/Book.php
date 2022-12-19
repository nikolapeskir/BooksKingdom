<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;

class Book extends Model
{
    use HasFactory;
    use BelongsToUser;

    protected $guarded = [];

    public static function filterable(): array
    {
        return [
            'title',
            AllowedFilter::partial('author_id', 'author.name'),
        ];
    }

    public static function sortable(): array
    {
        return [
            'id',
            'title',
            AllowedSort::field('author_name', 'author_id'),
            'published_at',
            'updated_at',
            'created_at',
        ];
    }

    public function author()
    {
        return $this->hasOne(\App\Models\BookAuthor::class, 'id', 'author_id');
    }
}
