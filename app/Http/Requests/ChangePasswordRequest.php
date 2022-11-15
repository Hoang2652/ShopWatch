<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'oldpassword' => 'required|min:6',
            'newpassword' => 'required|min:6|max:24',
            'retypenewpassword' => 'same:newpassword|required'
        ];
    }

    public function messages()
    {
        return [
                'oldpassword.min' => 'bạn phải nhập đúng mật khẩu' ,
                'newpassword.min' => 'Bạn phải nhập mật khẩu mới ít nhất 6 kí tự',
                'newpassword.max' => 'Bạn phải nhập mật khẩu mới tối đa 24 kí tự',
                'retypenewpassword.same' => 'Bạn nhập sai mật khẩu',
                'required' => 'Hãy điền thông tin vào đây'
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count() > 0) {
                toastr()->error('Đổi mật khẩu không thành công, vui lòng kiểm tra lại !');
            }
        });
    }
}
