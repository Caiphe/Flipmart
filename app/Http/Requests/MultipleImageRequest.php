<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultipleImageRequest extends FormRequest
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
            'product_id' => ['required'],
            'photo_name' => ['required'],
        ];
    }

    public function prepareForValidation(){
        $this->merge([
            'product_id' => htmlspecialchars($this->product_id),
            'photo_name' => htmlspecialchars($this->photo_name)
        ]);
    }
}
