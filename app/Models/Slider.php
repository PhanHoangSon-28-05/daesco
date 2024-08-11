<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    const INDEX = "sliders.index";

    protected $table = 'sliders';

    protected $fillable = [
        'stt',
        'pic'
    ];
}
