<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuOrganizational extends Model
{
    use HasFactory;

    protected $table = 'menu_organizationals';

    protected $fillable = [
        'name_vi',
        'name_en',
    ];

    public function organizationals(): HasMany
    {
        return $this->hasMany(Organizational::class, 'parent_id');
    }
}
