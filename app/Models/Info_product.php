<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_product extends Model
{
    use HasFactory;

    protected $table = 'info_products';

    protected $fillable = [
        'address',
        'hotline',
        'email',
    ];
}
