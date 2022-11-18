<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'hoten' => 'required|min:3',
            'diachi' => 'required|min:6',
            'dienthoai' => 'min:10|max:11',
            'email' => 'required|email',
            'phuongthuc' => 'in:2,3'
        ];
    }

    public function messages()
    {
        return [
                'hoten.required' => 'bạn phải nhập họ tên',
                'diachi.required' => 'bạn phải nhập địa chỉ',
                'dienthoai.min' => 'bạn phải nhập số điện thoại từ 10 đến 11 số',
                'dienthoai.max' => 'bạn phải nhập số điện thoại từ 10 đến 11 số',
                'email.email' => '=bạn phải nhập đúng email ',
                'phuongthuc.in' => 'bạn phải chọn một phương thức thanh toán',
                'required' => 'Hãy điền thông tin vào đây'
        ];

    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count() > 0) {
                toastr()->error('Thanh toán thất bại, vui lòng kiểm tra lại !');
            }
        });
    }
}
