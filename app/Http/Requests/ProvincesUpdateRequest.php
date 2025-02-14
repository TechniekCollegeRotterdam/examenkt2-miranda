<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProvincesUpdateRequest extends FormRequest
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
        $province = $this->route('province');
        return [
            'name' => 'required|max:100|unique:provinces,name,'.$province->id,
        ];
    }
}
