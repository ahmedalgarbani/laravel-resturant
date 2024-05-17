<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name'=>['required','max:255'],
            'category'=>['required','integer'],
            'price'=>['required','numeric'],
            'offer_price'=>['nullable','numeric'],
            'quantity'=>['required','numeric'],
            'short_description'=>['required','max:5000'],
            'long_description'=>['required'],
            'sku'=>['nullable','max:255'],
            'seo_title'=>['nullable','max:255'],
            'seo_description'=>['nullable','max:255'],
            'show_at_home'=>['boolean'],
            'status'=>['required','boolean'],
        ];
    }
}
