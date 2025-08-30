<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'nim' => 'required|string|max:20',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|nullable|string|max:15',
            'date_of_birth' => 'required|nullable|date',
            'department' => 'required|string|max:50',
        ];
    }
}
