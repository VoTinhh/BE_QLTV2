<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NguoiDungUpdateRequest extends FormRequest
{
    /**
     * Xác định xem người dùng có được phép thực hiện yêu cầu này không.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // Cho phép thực hiện yêu cầu (có thể thay đổi tùy vào logic quyền người dùng)
    }

    /**
     * Lấy các quy tắc xác thực áp dụng cho yêu cầu này.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Lấy ID từ route hoặc payload
        $id = $this->route('nguoi_dung') ?? $this->input('id');

        return [
            'id'  => 'required|exists:nguoi_dungs,id', // Đảm bảo ID tồn tại
            'ten_nguoi_dung' => 'nullable|string|max:50',
            'hinh_anh'       => 'nullable|string',
            'email'          => "required|email|max:255|unique:nguoi_dungs,email,{$id},id", // Bỏ qua bản ghi hiện tại
            'so_dien_thoai'  => 'nullable|regex:/^[0-9]{10}$/',
            'dia_chi'        => 'nullable|string|max:150',
        ];
    }

    /**
     * Lấy các thông báo lỗi tùy chỉnh khi xác thực không thành công.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'id.required'  => 'ID người dùng là bắt buộc.',
            'id.exists'    => 'Người dùng không tồn tại.',

            'ten_nguoi_dung.string'   => 'Tên người dùng phải là chuỗi ký tự.',
            'ten_nguoi_dung.max'      => 'Tên người dùng không được vượt quá 50 ký tự.',

            'hinh_anh.string'         => 'Hình ảnh phải là chuỗi ký tự hợp lệ.',

            'email.required'          => 'Vui lòng nhập email.',
            'email.email'             => 'Email phải có định dạng hợp lệ.',
            'email.max'               => 'Email không được vượt quá 255 ký tự.',
            'email.unique'            => 'Email này đã được sử dụng.',

            'so_dien_thoai.regex'     => 'Số điện thoại phải có 10 chữ số.',

            'dia_chi.string'          => 'Địa chỉ phải là chuỗi ký tự hợp lệ.',
            'dia_chi.max'             => 'Địa chỉ không được vượt quá 150 ký tự.',
        ];
    }
}
