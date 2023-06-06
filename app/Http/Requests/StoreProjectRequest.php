<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required','string','max:255', Rule::unique('projects')],
            'description' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il campo titolo è obbligatorio',
            'title.string' => 'Il titolo deve essere un testo',
            'title.max' => 'Il titolo può essere massimo 255 caratteri',
            'title.unique' => 'Il titolo è già stato utilizzato',
            'description.required' => 'Il campo descrizione è obbligatorio',
            'description.string' => 'La descrizione deve essere un testo',
            'description.max' => 'La descrizione può essere massimo 255 caratteri',
        ];
    }
}
