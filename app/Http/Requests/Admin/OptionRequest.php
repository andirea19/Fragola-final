<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OptionRequest extends FormRequest
{
    /** siehe Admin Validierung
     * vergleicht mit app\Http\Controllers\Admin\CategoryController.php
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
            'question_id' => 'required',
            'option_text' => 'required',
            'points' => 'nullable'
        ];
    }
}
