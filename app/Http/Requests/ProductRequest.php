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
          'brand_id' => ['required'],
          'category_id' => ['required'],
          'subcategory_id' => ['required'],
          'subsubcategory_id' => ['required'],
          'name' => ['required', 'string'],
          'slug' => ['nullable'],
          'code' => ['nullable'],
          'quantity' => ['required'],
          'tags' => ['nullable'],
          'size' => ['required'],
          'color' => ['nullable'],
          'price' => ['required'],
          'discount_price' => ['nullable'],
          'short_description' => ['nullable'],
          'description' => ['nullable'],
          'thumbanail' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'dimensions:min_width=100,min_height=100,max_width=2000, max_height=2000', 'max:2048'],
          'hot_deal' => ['nullable'],
          'featured' => ['nullable'],
          'special_deal' => ['nullable'],
          'status' => ['nullable'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'brand_id' => htmlspecialchars($this->brand_id, ENT_NOQUOTES),
            'category_id' => htmlspecialchars($this->category_id, ENT_NOQUOTES),
            'subcategory_id' => htmlspecialchars($this->subcategory_id, ENT_NOQUOTES),
            'subsubcategory_id' => htmlspecialchars($this->subsubcategory_id, ENT_NOQUOTES),
            'name' => htmlspecialchars($this->name, ENT_NOQUOTES),
            'slug' => htmlspecialchars($this->slug, ENT_NOQUOTES),
            'code' => htmlspecialchars($this->code, ENT_NOQUOTES),
            'quantity' => htmlspecialchars($this->quantity, ENT_NOQUOTES),
            'tags' => htmlspecialchars($this->tags, ENT_NOQUOTES),
            'size' => htmlspecialchars($this->size, ENT_NOQUOTES),
            'color' => htmlspecialchars($this->color, ENT_NOQUOTES),
            'price' => htmlspecialchars($this->price, ENT_NOQUOTES),
            'discount_price' => htmlspecialchars($this->discount_price, ENT_NOQUOTES),
            'short_description' => htmlspecialchars($this->short_description, ENT_NOQUOTES),
            'description' => htmlspecialchars($this->description, ENT_NOQUOTES),
            'thumbanail' => htmlspecialchars($this->thumbanail, ENT_NOQUOTES),
            'hot_deal' => htmlspecialchars($this->hot_deal, ENT_NOQUOTES),
            'featured' => htmlspecialchars($this->featured, ENT_NOQUOTES),
            'special_deal' => htmlspecialchars($this->special_deal, ENT_NOQUOTES),
            'status' => htmlspecialchars($this->status, ENT_NOQUOTES),
        ]);
    }

    public function messages()
    {
        return [
            'dimensions' => 'Image width and height should be less than 2000px'
        ];
    }
}
