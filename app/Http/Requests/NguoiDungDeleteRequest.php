<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NguoiDungDeleteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'id' => $this->route('id'),
        ]);
    }
    public function messages(): array
    {
        return [
            'id.required' => 'Vui lòng cung cấp ID người dùng để xóa.',
            'id.exists'   => 'Người dùng cần xóa không tồn tại.',
        ];
    }
}
