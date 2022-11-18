<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;

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
            'tensanpham' => 'required|min:6',
            'iddanhmuc' => 'required',
            'soluong' => 'required',
            'gia' => 'required',
            'hinhanh' => 'image|mimes:jpg,png,jpeg|max:2048|dimensions:min_width=100,min_height=100,max_width=1500,max_height=1500',
            'loaisanpham' => 'required',
            'mota' => 'required',
        ];
    }

    public function messages()
    {
        return [
                'tensanpham.required' => 'tên sản phẩm không thể bỏ trống !',
                'tensanpham.min' => 'tên sản phẩm tối thiểu 6 ký tự',
                'loaisanpham.required' => 'loại sản phẩm không thể bỏ trống !',
                'hinhanh.image' => 'Đây phải là file ảnh',
                'hinhanh.mimes' => 'File ảnh phải ở định dạng jpg, png hoặc jpeg',
                'hinhanh.max' => 'Fiel ảnh không vượt quá 2MB',
                'hinhanh.dimensions' => 'Kích cỡ ảnh trong khoảng (100x100) cho tới (1500x1500)',
                'required' => 'Hãy điền thông tin vào đây ạ !'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count() > 0) {
                toastr()->error('Thêm sản phẩm thất bại, vui lòng kiểm tra lại !');
            }
        });
    }
}
