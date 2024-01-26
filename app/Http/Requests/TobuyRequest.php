<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TobuyRequest extends FormRequest
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
            'tobuy.tobuy' => 'required|string',
            'tobuy.deadline' => 'required|after:yesterday|date',
            'tobuy.count' => 'required|integer|min:1',
        ];
    }
}
