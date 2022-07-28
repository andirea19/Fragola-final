<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//Ist die Authorisierung gegeben? -> hat nix mit dem Unit Test zu tun

class StoreTestRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /** Admin Validierung
     *
     * @return array
     */
    public function rules()
    {
        return [
            'questions'     => [
                'required', 'array'
            ],
            'questions.*' => [
                'required', 'integer', 'exists:options,id'
            ],
        ];
    }
}
