<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhanVienCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Thay đổi thành true nếu bạn muốn cho phép tất cả người dùng thực hiện yêu cầu này
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ten_nhan_vien'      => 'required|string|max:100', // Tên nhân viên bắt buộc và tối đa 100 ký tự
            'hinh_anh'           => 'nullable|string', // Đường dẫn ảnh (nullable)
            'email'              => 'required|email|max:255|unique:nhan_viens,email', // Email nhân viên phải hợp lệ và duy nhất
            'so_dien_thoai'      => 'nullable|regex:/^[0-9]{10}$/', // Số điện thoại (10 chữ số)
            'dia_chi'            => 'nullable|string|max:255', // Địa chỉ nhân viên, không quá 255 ký tự
            'mat_khau'              => 'required|string|min:6',
            'mat_khau_xac_nhan'     => 'required|string|same:mat_khau', // Xác thực "Nhập lại mật khẩu"
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'ten_nhan_vien.required' => 'Vui lòng nhập tên nhân viên.',
            'ten_nhan_vien.string'   => 'Tên nhân viên phải là chuỗi ký tự.',
            'ten_nhan_vien.max'      => 'Tên nhân viên không được vượt quá 100 ký tự.',

            'hinh_anh.string'        => 'Hình ảnh phải là chuỗi ký tự hợp lệ.',

            'email.required'         => 'Vui lòng nhập email.',
            'email.email'            => 'Email phải có định dạng hợp lệ.',
            'email.max'              => 'Email không được vượt quá 255 ký tự.',
            'email.unique'           => 'Email này đã được sử dụng.',

            'so_dien_thoai.regex'    => 'Số điện thoại phải là chuỗi 10 chữ số.',

            'dia_chi.string'         => 'Địa chỉ phải là chuỗi ký tự hợp lệ.',
            'dia_chi.max'            => 'Địa chỉ không được vượt quá 255 ký tự.',

            'mat_khau.required'      => 'Vui lòng nhập mật khẩu.',
            'mat_khau.string'        => 'Mật khẩu phải là chuỗi ký tự hợp lệ.',
            'mat_khau.min'           => 'Mật khẩu phải có ít nhất 6 ký tự.',

            'mat_khau_xac_nhan.required' => 'Vui lòng nhập lại mật khẩu.',
            'mat_khau_xac_nhan.string'   => 'Nhập lại mật khẩu phải là chuỗi ký tự hợp lệ.',
            'mat_khau_xac_nhan.same'     => 'Mật khẩu và nhập lại mật khẩu không khớp.',
        ];
    }
}
