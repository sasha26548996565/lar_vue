<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:30',
            'age' => 'required|integer|between:5,100',
            'job_title' => 'required|string|min:2'
        ];
    }
}
