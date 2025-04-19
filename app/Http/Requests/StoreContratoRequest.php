<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContratoRequest extends FormRequest
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
            'id_empleado' => 'nullable|integer|exists:empleados,id',
            'tipo' => 'nullable|string|max:100',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
        ];
    }
}
