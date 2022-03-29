<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    protected $fillable =[
        'brand_name',
        'brand_slug',
        'brand_image'
    ];

    public function setBrand_NameAttribute($brand_name){
        $this->attributes['brand_name'] = $brand_name;
        $this->attributes['brand_slug'] = Str::slug($brand_name);
    }
}
