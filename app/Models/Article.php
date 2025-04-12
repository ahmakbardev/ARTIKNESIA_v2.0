<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;


class Article extends Model
{
    use HasFactory;

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected $casts = [
        'categories' => 'array',
        'tags' => 'array',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getTags(): array|Collection
    {
        return ArticleTag::query()->whereIn('id', $this->tags ?? [])->pluck('name') ?? [];
    }

    public function getCategories(): array|Collection
    {
        return ArticleCategory::query()->whereIn('id', $this->categories ?? [])->pluck('name') ?? [];
    }
}
