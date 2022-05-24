<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'name'=>'required|regex:/^[a-zA-Z\ \.]+$/',
            'address' => 'required',
            'phone'=>'required|regex:/^(98)([0-9]{8})$/',
            'price_per_hour' => 'required|numeric|min:0|not_in:0',
            'logo_file' => 'mimes:png,jpg|max:2048',
            'fav_file' => 'mimes:png,jpg|max:2048',
        ];
    }
}
