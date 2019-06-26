<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'name'      =>  'required',
            'buy_price' =>  'bail | numeric | required',
            'price'     =>  'bail | numeric | required',
            'discount'  =>  'numeric',
            'quantity'  =>  'bail | numeric | required',
            'image1'    =>  'image',
            'image2'    =>  'image',
            'image3'    =>  'image',
            'specification.*'   => 'required',
        ];
    }
}
