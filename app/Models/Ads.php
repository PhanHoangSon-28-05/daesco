<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    const INDEX = "ads.index";

    protected $table = 'ads';

    protected $fillable = [
        'url',
        'pic'
    ];
}
