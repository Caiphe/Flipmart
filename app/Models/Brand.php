<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'brand_slug',
        'brand_image'
    ];

    public function setNameAttribute($name){
        $this->attributes['name'] = $name;
        $this->attributes['brand_slug'] = Str::slug($name);
    }
}
