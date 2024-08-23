<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    const INDEX = "category.index";

    protected $table = 'categories';

    protected $fillable = [
        'parent_id',
        'name_vi',
        'name_en',
        'slug',
        'image',
        'stt',
    ];

    public function prod(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function page(): HasOne
    {
        return $this->hasOne(Page::class, 'category_id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    public function parent_category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function child_categories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
