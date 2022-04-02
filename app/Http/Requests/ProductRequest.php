<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'brand_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'subcategory_id' => 'required|numeric',
            'subsubcategory_id' => 'required|numeric',
            'name' => 'required|string|max:255|min:3',
            'slug' => 'nullable|string',
            'code' => 'required',
            'quantity' => 'nullable|integer',
            'tags' => 'nullable',
            'size' => 'nullable',
            'color' => 'nullable',
            'price' => 'required|string',
            'discount_price' => 'nullable',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'thumbanail' => 'nullable',
            'hot_deal' => 'nullable',
            'featured' => 'nullable',
            'special_deal' => 'nullable',
            'status' => 'nullable',
        ];
    }

    public function prepareForValidation(){
        $this->merge([
            'brand_id' => htmlspecialchars($this->brand_id),
            'category_id' => htmlspecialchars($this->category_id),
            'subcategory_id' => htmlspecialchars($this->subcategory_id),
            'subsubcategory_id' => htmlspecialchars($this->subsubcategory_id),
            'name' => htmlspecialchars($this->name),
            'slug' => htmlspecialchars($this->slug),
            'code' => htmlspecialchars($this->code),
            'quantity' => htmlspecialchars($this->quantity),
            'tags' => htmlspecialchars($this->tags),
            'size' => htmlspecialchars($this->size),
            'color' => htmlspecialchars($this->color),
           ' price' => htmlspecialchars($this->price),
            'discount_price' => htmlspecialchars($this->discount_price),
            'short_description' => htmlspecialchars($this->short_description),
            'description' => htmlspecialchars($this->description),
            'thumbanail' => htmlspecialchars($this->thumbanail),
            'hot_deal' => htmlspecialchars($this->hot_deal),
            'featured' => htmlspecialchars($this->featured),
            'special_deal' => htmlspecialchars($this->special_deal),
            'status' => htmlspecialchars($this->status)
        ]);
    }
}
