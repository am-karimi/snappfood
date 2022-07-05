<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|max:40|min:4',
            'phone_number'=>['required','regex:/^09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}/','unique:restaurants'],
//            'bank_id'=>'/^(?:IR)(?=.{24}$)[0-9]*$/',   // validation for شماره شبا
            'bank_id'=>'required|min:7|max:12',
        ];
    }


    public function messages()
    {
        return [
            'name.required'=>'Require Name',
            'name.min'=>'Minimum characters in the name is 4 characters',
            'name.max'=>'Maximum characters in the name is 12 characters',
            'phone_number.required'=>'Require Phone Number',
            'phone_number.regex'=>'Phone Number Invalid',
            'bank_id.required'=>'Require Bank_ID',
            'bank_id.min'=>'Minimum characters in the Bank_id is 7 characters',
            'bank_id.max'=>'Maximum characters in the Bank_id is 12 characters',
        ];
    }
}
