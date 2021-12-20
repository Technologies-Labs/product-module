<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required|string',
            'description'=>'string|nullable',
            //'image'=>'required | image',
            'price'=>'required',
            'old_price'=>'required|string',
            'count'=>'required|int',
            'category_id'=>'required',
            'product_status_id'=>'required',
            'is_offer'=>'nullable',
            'offer_ratio'=>'nullable',

        ];
    }


    // public function messages()
    // {
    //     return [
    //        //
    //     ];
    // }

}
