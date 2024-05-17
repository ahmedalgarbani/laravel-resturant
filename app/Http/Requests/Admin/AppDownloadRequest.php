<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AppDownloadRequest extends FormRequest
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
            'image'=>['nullable','image'],
            'background'=>['nullable','image'],
            'title'=>['required','max:255'],
            'short_description'=>['required','max:3000'],
            'play_store_link'=>['nullable','url'],
            'apple_store_link'=>['nullable','url'],
        ];
    }
}
