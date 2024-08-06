<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    const INDEX = "info.index";

    protected $table = 'infos';

    protected $fillable = [
        'name_vi',
        'name_en',
        'phone',
    ];
}
