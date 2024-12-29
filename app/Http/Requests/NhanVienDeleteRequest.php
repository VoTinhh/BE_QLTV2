<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhanVienDeleteRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // ID nhân viên sẽ được lấy từ route, không cần truyền trong body request
            'id_nhan_vien' => 'required|exists:nhan_viens,id_nhan_vien',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'id_nhan_vien' => $this->route('id'), // Lấy 'id' từ route và gán vào input
        ]);
    }

    public function messages(): array
    {
        return [
            'id_nhan_vien.required' => 'Vui lòng cung cấp ID nhân viên để xóa.',
            'id_nhan_vien.exists'   => 'Nhân viên cần xóa không tồn tại.',
        ];
    }
}
