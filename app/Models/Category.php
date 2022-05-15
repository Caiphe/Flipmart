<?php

namespace App\Models;

use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon'
    ];
    

    // This is my great mutator
    public function setNameAttribute($name){
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }

    public function subCategory(){
        return $this->hasMany(Subcategory::class);
    }
}
