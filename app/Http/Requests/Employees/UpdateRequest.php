<?php

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'first_name' => 'required|string|max:60',
            'last_name' => 'required|string|max:60',
            'email' => 'required|email|unique:employees,email,' . $this->employee->id,
            'phone' => ['required', 'regex:/(01)[0-9]{9}/'],
            'occupation' => 'required|string|max:60',
            'company_id' => 'required|exists:companies,id'
        ];
    }
}
