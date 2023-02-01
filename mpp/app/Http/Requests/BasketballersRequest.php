<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasketballersRequest extends FormRequest
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
            'basketballers' => 'required|array',
            'basketballers.*.name' => 'required|string',
            'basketballers.*.team' => 'required|string',
            'basketballers.*.position' => 'required|string',
            'basketballers.*.odds' => 'required|int',
            'basketballers.*.status' => 'required|string'
        ];
    }
}
