<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TecnicoRequest extends FormRequest
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
			'id_tecnico' => 'required',
			'primer_nombre' => 'required|string',
			'segundo_nombre' => 'string',
			'primer_apellido' => 'required|string',
			'segundo_apellido' => 'string',
			'especialidad' => 'string',
			'telefono' => 'required|string',
			'email' => 'required|string',
        ];
    }
}
