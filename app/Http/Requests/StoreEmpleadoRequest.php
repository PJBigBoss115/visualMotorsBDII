<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpleadoRequest extends FormRequest
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
            'nombre' => 'nullable|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'cargo' => 'nullable|string|max:100',
            'salario' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/|min:0',
            'fecha_contratacion' => 'nullable|date',
            'id_usuario' => 'nullable|integer|exists:users,id',
        ];
    }
}
