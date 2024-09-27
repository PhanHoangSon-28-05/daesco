<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    const INDEX = "products.index";

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'title_vi',
        'payload_vi',
        'description_vi',
        'slug',
        'title_en',
        'payload_en',
        'description_en',
        'general_specifications_vi',
        'features_vi',
        'general_specifications_en',
        'features_en',
        'price',
        'links',
        'pic',
        'service_type_id',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ImageProduct::class, 'product_id');
    }

    public function service_type() {
        return $this->belongsTo(ServiceType::class, 'service_type_id');
    }
}
