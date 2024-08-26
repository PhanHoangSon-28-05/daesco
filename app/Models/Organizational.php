<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizational extends Model
{
    use HasFactory;

    const INDEX = "organizational.index";

    protected $table = 'organizationals';

    protected $fillable = [
        'parent_id',
        'pic',
        'name_vi',
        'name_en',
        'position_vi',
        'position_en',
    ];
}
