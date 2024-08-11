<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    const INDEX = "posts.index";

    protected $table = 'posts';

    protected $fillable = [
        'category_id',
        'user_id',
        'name_vi',
        'name_en',
        'pic',
        'slug',
        'description_vi',
        'description_en',
        'detail_vi',
        'detail_en',
        'years_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
