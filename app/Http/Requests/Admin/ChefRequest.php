<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ChefRequest extends FormRequest
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
            'title' => 'required|max:255',
            'name' => 'required|max:255',
            'image' => $this->has('chef_id') ?'nullable': 'required|image|max:255',
            'status' => 'required|max:255',
            'fb'=>'nullable|max:255',
            'in'=>'nullable|max:255',
            'web'=>'nullable|max:255',
            'x'=>'nullable|max:255',
            'show_at_home' => 'required|max:255',
        ];
    }
}
