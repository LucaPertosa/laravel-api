<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'slug' => 'required|string|regex:/^[^\s]+$/',
            'description' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il campo titolo è obbligatorio',
            'title.string' => 'Il titolo deve essere un testo',
            'title.max' => 'Il titolo può essere massimo 255 caratteri',
            'slug.required' => 'Il campo slug è obbligatorio',
            'slug.string' => 'Il campo slug deve essere un testo',
            'slug.regex' => 'Il campo slug deve essere uguale al campo titolo ma con _ al posto degli spazi',
            'description.required' => 'Il campo descrizione è obbligatorio',
            'description.string' => 'La descrizione deve essere un testo',
            'description.max' => 'La descrizione può essere massimo 255 caratteri',
        ];
    }
}
