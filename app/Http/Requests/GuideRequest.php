<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuideRequest extends FormRequest
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
        if ($this->method() == 'PUT') {
            $nameRule = "required|unique:guides,name,{$this->id}";
        } else {
            $nameRule = 'required|unique:guides';
        }

        return [
            'name'      => $nameRule,
            'summary'   => 'required',
            'hero'      => 'required',
            'pros'      => 'required',
            'cons'      => 'required',
            'build'     => 'required',
        ];
    }
}
