<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'tendangnhap' => 'required|min:6',
            'matkhau' => 'required|min:6|max:24',
            'matkhau1' => 'same:matkhau|required',
            'dienthoai' => 'min:10|max:11',
            'email' => 'required|email',
            'diachi' => 'required|min:10',
            'ngaysinh' => 'required|date',
            'gioitinh' => 'in:nam,nu'
        ];
    }

    public function messages()
    {
        return [
                'tendangnhap.required' => 'Hãy đặt tên đăng nhập cho tài khoản nào !',
                'tennguoidung.required' => 'tên người dùng không thể bỏ trống !',
                'tennguoidung.min' => 'tên người dùng tối thiểu 6 ký tự',
                'matkhau.required' => 'mật khẩu không thể bỏ trống !',
                'matkhau.min' => 'mật khẩu có độ dài từ 6-24 ký tự',
                'matkhau.max' => 'mật khẩu có độ dài từ 6-24 ký tự',
                'nhap1.same' => 'Mật khẩu nhập lại không trùng khớp ',
                'gioitinh.in' => 'bạn chưa chọn hỗ trợ',
                'email.email' => 'bạn phải nhập địa chỉ email hợp lệ',
                'ngaysinh.required' => 'bạn chưa chọn ngày sinh',
                'dienthoai.min' => 'Số điện thoại không hợp lệ',
                'dienthoai.max' => 'Số điện thoại không hợp lệ',
                'diachi.min' => 'bạn phải nhập đầy đủ địa chỉ của mình',
                'required' => 'Hãy điền thông tin vào đây'  
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count() > 0) {
                toastr()->error('Đăng ký thất bại, vui lòng kiểm tra lại !');
            }
        });
    }
}
