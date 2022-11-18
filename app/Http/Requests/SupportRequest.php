<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportRequest extends FormRequest
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
            'hoten' => 'required|min:8',
            'email' => 'required|email',
            'dienthoai' => 'min:10|max:11',
            'chude' => 'required|min:5',
            'noidung' => 'required|min:10|max:400'
        ];
    }
    public function messages()
    {
        return [
                'hoten.min' => 'Bạn phải nhập họ tên nhiều hơn 8 kí tự',
                'email.email' => 'Bạn nhập sai cú pháp email',
                'dienthoai.min' => 'Số điện thoại không hợp lệ',
                'dienthoai.max' => 'Số điện thoại không hợp lệ',
                'chude.min' => 'Bạn phải nhập đầy đủ chủ đề của mình ít nhất 5 kí tự',
                'chude.min' => 'Bạn phải nhập nội dung ít nhất 10 kí tự',
                'chude.min' => 'Bạn phải nhập nội dung tối đa 400 kí tự',
                'required' => 'Hãy điền thông tin vào đây'  
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count() > 0) {
                toastr()->error('Gửi hỗ trợ thất bại, vui lòng kiểm tra lại !');
            }
        });
    }
}
