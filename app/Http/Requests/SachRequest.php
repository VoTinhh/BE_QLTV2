<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SachRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ten_sach'  => 'required|string|max:50',
            'so_luong'  => 'required|integer|min:1',
            'trang_thai'=> 'required|string',
            'hinh_anh'  => 'nullable|string',
            'gia_tien'  => 'required|numeric',
            'mo_ta'     => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'ten_sach.required' => 'Tên sách là bắt buộc.',
            'so_luong.required' => 'Số lượng là bắt buộc.',
            'so_luong.integer'  => 'Số lượng phải là một số nguyên.',
            'gia_tien.required' => 'Giá tiền là bắt buộc.',
            'gia_tien.numeric'  => 'Giá tiền phải là một số.',
            'trang_thai.required' => 'Trạng thái là bắt buộc.',
        ];
    }
}
