<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'brand_name' => 'required',
            'brand_slug' => 'nullable',
            'brand_image' => 'required'
        ];
    }

    public function prepareForValidation(){
        $this->merge([
            'brand_name' => htmlspecialchars($this->brand_name),
            'brand_slug' => htmlspecialchars($this->brand_slug),
            'brand_image' => htmlspecialchars($this->brand)
        ]);
    }
}