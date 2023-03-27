<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaispFormRequest extends FormRequest
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
     * @return array<string, mixed
     */
    public function rules(){
    {
        return [
            'tenloai' =>[
                'required',
                'string'
            ],
            'slug' =>[
                'required',
                'string'
            ],
            'mota' =>[
                'required',
                'string'
            ],
            'hinhanh'=>[
                'nullable',
                'mimes:jpg,jpeg,png'
            ],
            'meta_tieude' =>[
                'required',
                'string'
            ],
            'meta_keyword' =>[
                'required',
                'string'
            ],
            'meta_mota' =>[
                'required',
                'string'
            ],

            
        ];
    }
}
}
