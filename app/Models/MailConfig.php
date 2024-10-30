<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailConfig extends Model
{
    use HasFactory;

    const INDEX = "mail-configs.index";

    protected $fillable = [
        'username',
        'password',
        'from_address',
        'from_name',
        'to_address',
    ];
}
