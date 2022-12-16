<?php

namespace App\Http\Requests\Companies;

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
            'name' => 'required|string|max:60',
            'email' => 'required|email|unique:companies,email,' . $this->company->id,
            'website' => 'required|url|max:199',
            'revenue' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'logo' => 'sometimes|image|mimes:jpg,jpeg,png,gif,svg|dimensions:min_width=100,min_height=100'
        ];
    }
}
