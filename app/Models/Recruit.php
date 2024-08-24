<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruit extends Model
{
    use HasFactory;

    const INDEX = "recruit.index";

    protected $fillable = [
        'title_vi',
        'title_en',
        'position_vi',
        'position_en',
        'workplace_vi',
        'workplace_en',
        'content_vi',
        'content_en',
        'salary',
        'amount',
        'email',
        'expired_at',
        'slug',
    ];
}
