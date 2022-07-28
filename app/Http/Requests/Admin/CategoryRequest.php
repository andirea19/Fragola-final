<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /** siehe Admin Validierung
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /** Request überprüfen
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
        ];
    }
}

//Für alle Kategorien oder nur für einige?
//Verbindung zu app\Http\Controllers\Admin\CategoryController.php beim Editieren beachten!