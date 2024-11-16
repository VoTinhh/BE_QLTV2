<?php

namespace App\Http\Controllers;

use App\Http\Requests\NguoiDungRequest;
use App\Models\NguoiDung;
use Illuminate\Http\Request;

class NguoiDungController extends Controller
{
    // Thêm mới người dùng
    public function store(NguoiDungRequest $request)
    {
        try {
            $data = $request->validated();

            $nguoiDung = NguoiDung::create($data);

            return response()->json([
                'status'  => 1,
                'message' => 'Đã thêm mới người dùng thành công.',
                'data'    => $nguoiDung,  // Trả lại dữ liệu người dùng vừa thêm
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 0,
                'message' => 'Thêm mới người dùng thất bại: ' . $e->getMessage(),
            ], 500);
        }
    }

    // Lấy dữ liệu người dùng
    public function getData()
    {
        try {
            $data = NguoiDung::all();

            return response()->json([
                'status' => 1,
                'data'   => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 0,
                'message' => 'Lấy dữ liệu thất bại: ' . $e->getMessage(),
            ], 500);
        }
    }

    // Cập nhật thông tin người dùng
    public function update(NguoiDungRequest $request, $id)
    {
        try {
            $nguoiDung = NguoiDung::findOrFail($id); // Tìm người dùng theo ID

            $data = $request->validated();

            $nguoiDung->update($data);

            return response()->json([
                'status'  => 1,
                'message' => 'Cập nhật thông tin người dùng thành công.',
                'data'    => $nguoiDung,  // Trả lại dữ liệu người dùng đã cập nhật
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 0,
                'message' => 'Cập nhật thất bại: ' . $e->getMessage(),
            ], 500);
        }
    }

    // Xóa người dùng
    public function delete($id)
    {
        try {
            $nguoiDung = NguoiDung::findOrFail($id); // Tìm người dùng theo ID
            $nguoiDung->delete();

            return response()->json([
                'status'  => 1,
                'message' => 'Xóa người dùng thành công.',
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status'  => 0,
                'message' => 'Người dùng không tồn tại.',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 0,
                'message' => 'Xóa người dùng thất bại: ' . $e->getMessage(),
            ], 500);
        }
    }
}
