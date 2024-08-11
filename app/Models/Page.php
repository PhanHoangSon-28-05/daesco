<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    const INDEX = "pages.index";

    protected $table = 'pages';

    protected $fillable = [
        'category_id',
        'name_vi',
        'name_en',
        'pic',
        'slug',
        'description_vi',
        'description_en',
        'detail_vi',
        'detail_en',
    ];
}
