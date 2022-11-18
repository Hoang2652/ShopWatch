<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;

class NewsRequest extends FormRequest
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
            'tieude' => 'required|min:6',
            'tacgia' => 'required',
            'noidungchitiet' => 'required',
            'hinhanh' => 'image|mimes:jpg,png,jpeg|max:2048|dimensions:min_width=100,min_height=100,max_width=1500,max_height=1500',
        ];
    }

    public function messages()
    {
        return [
                'tieude.required' => 'tên tin tức không thể bỏ trống !',
                'tieude.min' => 'tên tin tức tối thiểu 6 ký tự',
                'noidungchitiet.required' => 'Đăng tin tức sao lại bỏ trống thế này ?',
                'hinhanh.image' => 'Đây phải là file ảnh',
                'hinhanh.mimes' => 'File ảnh phải ở định dạng jpg, png hoặc jpeg',
                'hinhanh.max' => 'File ảnh không vượt quá 2MB',
                'hinhanh.dimensions' => 'Kích cỡ ảnh trong khoảng (100x100) cho tới (1500x1500)',
                'required' => 'Hãy điền thông tin vào đây ạ !'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count() > 0) {
                toastr()->error('Thêm tin tức thất bại, vui lòng kiểm tra lại !');
            }
        });
    }
}
