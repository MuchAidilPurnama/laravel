<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' => 'required|string',
            'deadline' => 'nullable|date',
            'completed' => 'boolean',
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
{
    $response = response()->json([
        'message' => 'The given data was invalid.',
        'errors' => $validator->errors(),
    ], 422);

    throw new \Illuminate\Validation\ValidationException($validator, $response);
}

}
