<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
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
			'id_servicio' => 'required',
			'fecha_recepcion' => 'required',
			'descripcion_problema' => 'required|string',
			'id_estado_servicio' => 'required',
			'diagnostico_servicio' => 'string',
			'solucion_servicio' => 'string',
			'id_tecnico' => 'required',
			'id_equipo' => 'required',
			'id_cliente' => 'required',
        ];
    }
}
