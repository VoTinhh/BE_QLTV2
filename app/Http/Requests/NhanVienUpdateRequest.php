<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhanVienUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        // Lấy ID từ route hoặc payload
        $id = $this->route('nhan_vien') ?? $this->input('id_nhan_vien');

        return [
            'id_nhan_vien'  => 'required|exists:nhan_viens,id_nhan_vien', // Đảm bảo ID tồn tại trong database
            'ten_nhan_vien' => 'nullable|string|max:100',
            'hinh_anh'      => 'nullable|string',
            'email'          => "required|email|max:255|unique:nhan_viens,email,{$id},id_nhan_vien", // Bỏ qua bản ghi hiện tại với ID này
            'so_dien_thoai'  => 'nullable|regex:/^[0-9]{10}$/',
            'dia_chi'        => 'nullable|string|max:255',
            'mat_khau'              => 'required|string|min:6',
            'mat_khau_xac_nhan'     => 'required|string|same:mat_khau',
        ];
    }
    public function messages(): array
    {
        return [
            'id_nhan_vien.required'  => 'ID nhân viên là bắt buộc.',
            'id_nhan_vien.exists'    => 'Nhân viên không tồn tại.',

            'ten_nhan_vien.string'   => 'Tên nhân viên phải là chuỗi ký tự.',
            'ten_nhan_vien.max'      => 'Tên nhân viên không được vượt quá 100 ký tự.',

            'hinh_anh.string'         => 'Hình ảnh phải là chuỗi ký tự hợp lệ.',

            'email.required'          => 'Vui lòng nhập email.',
            'email.email'             => 'Email phải có định dạng hợp lệ.',
            'email.max'               => 'Email không được vượt quá 255 ký tự.',
            'email.unique'            => 'Email này đã được sử dụng.',

            'so_dien_thoai.regex'     => 'Số điện thoại phải có 10 chữ số.',

            'dia_chi.string'          => 'Địa chỉ phải là chuỗi ký tự hợp lệ.',
            'dia_chi.max'             => 'Địa chỉ không được vượt quá 255 ký tự.',

            'mat_khau.required'      => 'Vui lòng nhập mật khẩu.',
            'mat_khau.string'        => 'Mật khẩu phải là chuỗi ký tự hợp lệ.',
            'mat_khau.min'           => 'Mật khẩu phải có ít nhất 6 ký tự.',

            'mat_khau_xac_nhan.required' => 'Vui lòng nhập lại mật khẩu.',
            'mat_khau_xac_nhan.string'   => 'Nhập lại mật khẩu phải là chuỗi ký tự hợp lệ.',
            'mat_khau_xac_nhan.same'     => 'Mật khẩu và nhập lại mật khẩu không khớp.',
        ];
    }
}
