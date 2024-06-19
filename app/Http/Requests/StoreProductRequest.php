<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'string'],
            'image' => ['url', 'nullable'],
            'slug' => ['string'],
            'description' => ['string'],
            'price' => ['numeric'],
            'status' => ['boolean']

        ];
    }

    public function messages()
    {
        /* MESSAGGIO */
        return [
            'title.required' => 'Il nome è obbligatorio.',
            'title.min' => 'Il nome deve contenere almeno :min caratteri.',
            'title.unique' => 'Prodotto esistente',
            'image.url' => 'URL errato',
        ];
    }
}
