<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTargetForm extends FormRequest
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
            'target' => 'required|string|max:20',
            'reason' => 'required|string|max:20',
            'deadline' => 'required|date|after_or_equal:today',
            'small_target1' => 'required|string|max:20',
            'small_target2' => 'required|string|max:20',
            'small_target3' => 'required|string|max:20',
            'target_category' => 'required',
        ];
    }
}
