<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanphamFormRequest extends FormRequest
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
            'loaisp_id' =>[
                'required',
                'integer'
            ],
            'tensanpham' =>[
                'required',
                'string'
            ],
            'slug' =>[
                'required',
                'string'
            ],
            'nhacungcap' =>[
                'required',
                'string',
                'max:255'
            ],
            'small_mota' =>[
                'required',
                'string'
            ],
            'mota' =>[
                'required',
                'string'
            ],
            'original_gia' =>[
                'required',
                'integer'
            ],
            'selling_gia' =>[
                'required',
                'integer'
            ],
            'soluong' =>[
                'required',
                'integer'
            ],
            'banchay' =>[
                'nullable',
                
            ],
            'trangthai' =>[
                'nullable',
                
            ],
            'meta_tieude' =>[
                'required',
                'string',
                'max:255'
            ],
            'meta_keyword' =>[
                'required',
                'string'
            ],
            'meta_mota' =>[
                'required',
                'string'
            ],

            'hinhanh' => [
                'nullable',
                // 'image|mimes:jpeg,png,jpg'
            ],
        ];
    }
}
