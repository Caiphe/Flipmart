<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'category_id' => ['required', 'numeric'],
            'name' => ['required', 'string'],
        ];
    }

    public function prepareForValidation(){
        $this->merge([
           'category_id' => htmlspecialchars($this->category_id),
           'name' => htmlspecialchars($this->name),
        ]);
    }
}
