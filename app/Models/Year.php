<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    const INDEX = "years.index";

    protected $table = 'years';

    protected $fillable = [
        'name'
    ];
}
