<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phone_one'=>['nullable','max:50'],
            'phone_two'=>['nullable','max:50'],

            'email_one'=>['nullable','max:250'],
            'email_two'=>['nullable','max:250'],

            'address'=>['nullable','max:255'],
            'map_link'=>['nullable','url','max:1000'],
        ];
    }
}
