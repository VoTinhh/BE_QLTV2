<?php

namespace App\Http\Controllers;

use App\Http\Requests\SachRequest;
use App\Models\Sach;
use Illuminate\Http\Request;

class SachController extends Controller
{
    // Lấy tất cả sách
    public function getData()
    {
        $data = Sach::all();
        return response()->json([
            'status' => 1,
            'data'   => $data,
        ], 200);
    }

    // Thêm mới sách
    public function store(SachRequest $request)
    {
        $sach = Sach::create($request->validated());

        return response()->json([
            'status'  => 1,
            'message' => 'Đã thêm mới sách thành công.',
            'data'    => $sach,
        ], 201);
    }

    // Cập nhật thông tin sách
    public function update(SachRequest $request, $id)
    {
        $sach = Sach::find($id);

        if (!$sach) {
            return response()->json([
                'status'  => 0,
                'message' => 'Sách không tồn tại.',
            ], 404);
        }

        $sach->update($request->validated());

        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật sách thành công.',
            'data'    => $sach,
        ], 200);
    }

    // Xóa sách
    public function delete($id)
    {
        $sach = Sach::find($id);

        if (!$sach) {
            return response()->json([
                'status'  => 0,
                'message' => 'Sách không tồn tại.',
            ], 404);
        }

        $sach->delete();

        return response()->json([
            'status'  => 1,
            'message' => 'Sách đã bị xóa.',
        ], 200);
    }
}
