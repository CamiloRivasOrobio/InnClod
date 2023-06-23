<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocDocumentoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'doc_id' => 'integer',
            'doc_nombre' => 'required|string|max:60',
            'doc_contenido' => 'required|string|max:4000',
            'doc_id_tipo' => 'integer',
            'doc_id_proceso' => 'integer',
        ];
    }
}