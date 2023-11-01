<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentsUpsertRequest extends FormRequest
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
            'title' => 'required',
            'rooms_number' => 'required',
            'beds_number' => 'required',
            'bathrooms_number' => 'required',
            'square_meters' => 'required',
            'address' => 'required',
            'thumbnail' => 'nullable',
            'visibility' => 'required',
            "services" => "nullable"
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Il campo titolo è obbligatorio.',
            'rooms_number.required' => 'Il campo numero di stanze è obbligatorio.',
            'beds_number.required' => 'Il campo numero di letti è obbligatorio.',
            'bathrooms_number.required' => 'Il campo numero di bagni è obbligatorio.',
            'square_meters.required' => 'Il campo della grandezza della casa è obbligatorio.',
            'address.required' => 'Il campo indirizzo è obbligatorio.',
            //'thumbnail.required' => 'Il campo immagine è obbligatorio.',
            'visibility.required' => 'Il campo visibilità è obbligatorio.',
        ];
    }
}
