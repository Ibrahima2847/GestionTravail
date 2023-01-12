<?php

namespace App\Http\Requests;

use App\Models\Metier;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OuvrierStore extends FormRequest
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
            'profession' => ['required'],
            'diplome' => ['required'],
            'cv' => ['required'],
            'potentiel' => ['required'],
            'photo' => ['required'],
            'ouvrier_id' => [Rule::unique(Metier::class),],
        ];
    }
}
