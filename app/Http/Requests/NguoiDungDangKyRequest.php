<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NguoiDungDangKyRequest extends FormRequest
{
    // Xác thực người dùng có quyền gửi yêu cầu hay không
    public function authorize(): bool
    {
        return true;  // Chấp nhận tất cả yêu cầu
    }

    // Định nghĩa các quy tắc xác thực
    public function rules(): array
    {
        return [
            'ten_nguoi_dung'     => 'required|min:4|max:50',
            'email'              => 'required|email|unique:nguoi_dungs,email',
            'so_dien_thoai'      => 'nullable|digits:10',
            'dia_chi'            => 'nullable|max:255',
            'mat_khau'           => 'required|min:6|max:30',
            'mat_khau_xac_nhan'  => 'required|same:mat_khau',
            'hinh_anh'           => 'nullable|string|max:2048',
        ];
    }

    // Tùy chỉnh thông báo lỗi
    public function messages(): array
    {
        return [
            'ten_nguoi_dung.required' => 'Tên người dùng là bắt buộc.',
            'ten_nguoi_dung.min'      => 'Tên người dùng phải có ít nhất 4 ký tự.',
            'ten_nguoi_dung.max'      => 'Tên người dùng không được vượt quá 50 ký tự.',
            'email.required'         => 'Địa chỉ email là bắt buộc.',
            'email.email'            => 'Email không đúng định dạng.',
            'email.unique'           => 'Email này đã được sử dụng. Vui lòng chọn email khác.',
            'so_dien_thoai.digits'   => 'Số điện thoại phải có đúng 10 chữ số.',
            'dia_chi.max'            => 'Địa chỉ không được vượt quá 255 ký tự.',
            'mat_khau.required'      => 'Mật khẩu là bắt buộc.',
            'mat_khau.min'           => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'mat_khau.max'           => 'Mật khẩu không được vượt quá 30 ký tự.',
            'mat_khau_xac_nhan.required'   => 'Mật khẩu nhập lại là bắt buộc.',
            'mat_khau_xac_nhan.same'       => 'Mật khẩu nhập lại không khớp.',
            'hinh_anh.string'         => 'Tệp hình ảnh không hợp lệ.',
            'hinh_anh.max'           => 'Kích thước hình ảnh không được vượt quá 2MB.',
        ];
    }
}
