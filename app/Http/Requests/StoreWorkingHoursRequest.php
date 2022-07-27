<?php

namespace App\Http\Requests;

use App\Models\WorkingHours;
use App\Rules\TimeOk;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreWorkingHoursRequest extends FormRequest
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

    private function week()
    {
        return implode(',',WorkingHours::Days);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'day'=>'bail|required|in:'.$this->week(),
            'open_time'=>['bail','required','date_format:H:i','after:08:30','before:23:30',new TimeOk($this)],
            'close_time'=>['bail','required','date_format:H:i','after:08:30','before:23:30',new TimeOk($this)]
        ];
    }

    public function messages()
    {
        return [
            'open_time.required'=>'Please Set Time',
            'open_time.after'=>'Please Set Time After 8:30',
            'open_time.before'=>'Please Set Time Before 23:30',

            'close_time.required'=>'Please Set Time',
            'close_time.after'=>'Please Set Time After 8:30',
            'close_time.before'=>'Please Set Time Before 23:30',
        ];
    }
}
