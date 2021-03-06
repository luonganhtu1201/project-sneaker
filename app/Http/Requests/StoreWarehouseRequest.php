<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWarehouseRequest extends FormRequest
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
            'import_goods.*' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'import_goods.*.required' => ':attribute không được để trống',
        ];
    }
    public function attributes(){
        return [
            'import_goods.*' => 'Số lượng nhập',
        ];
    }
}
