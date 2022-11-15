<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeProfileRequest extends FormRequest
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
            //
            'tennguoidung' => 'required|min:6',
            'dienthoai' => 'required|min:10|max:11',
            'email' => 'required|email',
            'diachi' => 'required|min:10',
            'ngaysinh' => 'required|date',
            'gioitinh' => 'in:nam,nu'
        ];
    }
    public function messages()
    {
        return [
            'tennguoidung.min' => 'Bạn phải nhập tên người dùng ít nhất 6 kí tự',
            'dienthoai.min' => "Bạn phỉa nhập số điện thoại từ 10-11 số",
            'dienthoai.max' => "Bạn phỉa nhập số điện thoại từ 10-11 số",
            'email.email' => 'Bạn nhập sai cú pháp email',
            'diachi.min' => 'Bạn phải nhập đầy đủ địa chỉ',
            'ngaysinh.date' => 'Bạn phải chọn ngày sinh',
            'gioitinh.in' => 'Bạn phải chọn giới tính',
            'required' => 'Hãy điền thông tin vào đây' 
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count() > 0) {
                toastr()->error('Thay đổi thông tin cá nhân thất bại, vui lòng kiểm tra lại !');
            }
        });
    }
}
