<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandUpdateRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:brands,slug,' . $this->brand
        ];

        if($this->get('logoUrl')){
            $rules = array_merge($rules,['logoUrl'=>'mimes:jpg,jpeg,png,gif']);
        }

        return $rules;
    }
}
