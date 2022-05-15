<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'category_id',
        'subcategory_id',
        'subsubcategory_id',
        'name',
        'slug',
        'code',
        'quantity',
        'tags',
        'size',
        'color',
        'price',
        'discount_price',
        'short_description',
        'description',
        'thumbanail',
        'hot_deal',
        'featured',
        'special_deal',
        'status',
    ];

    // protected $guarded = [];

    //Setting a dynamic Slug
    public function setNameAttribute($value){
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function brand(){
        return $this->hasOne(Brand::class);
    }

    public function category(){
        return $this->hasOne(Category::class);
    }

    public function subcategory(){
        return $this->hasOne(Subcategory::class);
    }
}
