<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NguoiDungRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ten_nguoi_dung' => 'required|string|max:50',
            'hinh_anh'       => 'nullable|string',
            'email'          => 'required|email|max:255|unique:nguoi_dungs,email',
            'so_dien_thoai'  => 'nullable|regex:/^[0-9]{10}$/',
            'dia_chi'        => 'nullable|string|max:150',
            'mat_khau'       => 'required|string|min:6',
            'phan_quyen'     => 'required|integer|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'ten_nguoi_dung.required' => 'Vui lòng nhập tên người dùng.',
            'ten_nguoi_dung.string'   => 'Tên người dùng phải là chuỗi ký tự.',
            'ten_nguoi_dung.max'      => 'Tên người dùng không được vượt quá 50 ký tự.',

            'hinh_anh.string'         => 'Hình ảnh phải là chuỗi ký tự hợp lệ.',

            'email.required'          => 'Vui lòng nhập email.',
            'email.email'             => 'Email phải có định dạng hợp lệ.',
            'email.max'               => 'Email không được vượt quá 255 ký tự.',
            'email.unique'            => 'Email này đã được sử dụng.',

            'so_dien_thoai.string'    => 'Số điện thoại phải là chuỗi ký tự hợp lệ.',
            'so_dien_thoai.max'       => 'Số điện thoại phải là 10 số.',

            'dia_chi.string'          => 'Địa chỉ phải là chuỗi ký tự hợp lệ.',
            'dia_chi.max'             => 'Địa chỉ không được vượt quá 150 ký tự.',

            'mat_khau.required'       => 'Vui lòng nhập mật khẩu.',
            'mat_khau.string'         => 'Mật khẩu phải là chuỗi ký tự hợp lệ.',
            'mat_khau.min'            => 'Mật khẩu phải có ít nhất 6 ký tự.',

            'phan_quyen.required'     => 'Vui lòng chọn quyền người dùng.',
            'phan_quyen.integer'      => 'Quyền người dùng phải là một số nguyên.',
            'phan_quyen.in'           => 'Quyền người dùng không hợp lệ.',
        ];
    }
}
