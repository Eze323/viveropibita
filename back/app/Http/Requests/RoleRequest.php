<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class RoleRequest extends FormRequest
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
            'name' => ['required','string','max:100',Rule::unique(table:'roles',column:'name')->ignore(id:request('roles'),idColumn:'id')],
        ];
    }

    public function  messages(): array
    {
        return [
            'name.required' => 'El nombre del rol es requerido',
            'name.string' => 'El nombre del rol debe ser un texto',
            'name.max' => 'El nombre del rol no debe exceder los 100 caracteres',
            'name.unique' => 'El nombre del rol ya existe',
        ];
    }
}
