<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;

class UserRequest extends FormRequest
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
            'tendangnhap' => 'required|min:6',
            'tennguoidung' => 'required|min:6',
            'matkhau' => 'required|min:8|max:24',
            'nhaplaimatkhau' => 'same:matkhau|required',
            'gioitinh' => 'in:nam,nu,bede',
            'email' => 'required|email',
            'dienthoai' => 'min:10|max:11',
            'phanquyen' => 'required|in:1,2'
        ];
    }

    public function messages()
    {
        return [
                'tendangnhap.required' => 'Hãy đặt tên đăng nhập cho tài khoản nào !',
                'tennguoidung.required' => 'tên người dùng không thể bỏ trống !',
                'tennguoidung.min' => 'tên người dùng tối thiểu 6 ký tự',
                'matkhau.required' => 'mật khẩu không thể bỏ trống !',
                'matkhau.min' => 'mật khẩu có độ dài từ 8-24 ký tự',
                'matkhau.max' => 'mật khẩu có độ dài từ 8-24 ký tự',
                'nhaplaimatkhau.same' => 'Mật khẩu nhập lại không trùng khớp ',
                'gioitinh.in' => 'Chưa hỗ trợ 36+ giới tính khác mong bạn thông cảm',
                'email.email' => 'Làm ơn ít ra nghỉ đại cái mail nào thì cũng nghĩ cho nó hợp lý chút chứ !',
                'dienthoai.min' => 'Số điện thoại không hợp lệ',
                'dienthoai.max' => 'Số điện thoại không hợp lệ',
                'phanquyen.required' => 'Hãy chọn quyền người dùng ạ',
                'phanquyen.min' => 'Quyền không hợp lệ',
                'phanquyen.max' => 'Quyền không hợp lệ',
                'required' => 'Hãy điền thông tin vào đây ạ !'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count() > 0) {
                toastr()->error('Thêm người dùng thất bại, vui lòng kiểm tra lại !');
            }
        });
    }
}
