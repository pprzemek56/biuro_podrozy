<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTripRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'price' => 'required|numeric',
            'free_space' => 'required|numeric|max:20',
            'start_date' => 'required|string|max:10',
            'end_date' => 'required|string|max:10',
            'description' => 'required|string|max:500',
        ];
    }
}
