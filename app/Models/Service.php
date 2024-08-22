<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    const INDEX = "services.index";

    protected $table = 'services';

    protected $fillable = [
        'name_vi',
        'name_en',
        'slug',
        'detail_vi',
        'detail_en',
        'pic',
        'slug_sections',
    ];
}
