<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            'firstname'=>'required|string|max:50',
            'lastname'=>'required|string|max:50',
            'email'=>'nullable|email|max:50',
            'phone'=>'nullable||digits:12',
            'company_id'=>'required'
        ];
    }
}
