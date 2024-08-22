<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Development extends Model
{
    use HasFactory;

    const INDEX = "developments.index";

    protected $table = 'developments';

    protected $fillable = [
        'date',
        'description',
        'pic'
    ];
}
