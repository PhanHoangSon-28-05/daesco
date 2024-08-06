<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    const PAGE_CATE_PRO = "page.category.product";
    const HOME = "index";
    const INTRODUCE = "introduce";
    const RECRUITMENT = "recruitment";
    const CONTACT = "contact";
}
