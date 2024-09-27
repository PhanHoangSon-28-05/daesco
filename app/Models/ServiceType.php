<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;

    const INDEX = "service-types.index";

    protected $fillable = [
        'title_vi',
        'title_en',
        'slug',
        'type',
        'parent_id',
        'pic',
    ];

    public function childs() {
        return $this->hasMany(ServiceType::class, 'parent_id');
    }

    public function parent() {
        return $this->belongsTo(ServiceType::class, 'parent_id');
    }

    public function products() {
        return $this->hasMany(Product::class, 'service_type_id');
    }

    public function services() {
        return $this->hasMany(Service::class, 'service_type_id');
    }
}
