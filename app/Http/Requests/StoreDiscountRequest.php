<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountRequest extends FormRequest
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
        # trick for redirect because create method is post not get
        $this->redirect= route('discounts.index');
        return[
            'title'=>'required|max:40|min:4',
            'value'=>'bail|required|',
        ];
    }
}
