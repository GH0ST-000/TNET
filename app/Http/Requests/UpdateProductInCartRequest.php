<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductInCartRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'product_id'=>'required|exists:carts',
            'quantity'=>'required|min:1'
        ];
    }
}
