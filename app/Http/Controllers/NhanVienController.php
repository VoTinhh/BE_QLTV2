<?php

namespace App\Http\Controllers;

use App\Http\Requests\NhanVienCreateRequest;
use App\Http\Requests\NhanVienUpdateRequest;
use App\Http\Requests\NhanVienDeleteRequest;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NhanVienController extends Controller
{
    // Thêm mới nhân viên
    public function store(NhanVienCreateRequest $request)
    {
        try {
            $data = $request->validated();

            $nhanVien = NhanVien::create($data);

            return response()->json([
                'status'  => 1,
                'message' => 'Đã thêm mới nhân viên thành công.',
                'data'    => $nhanVien,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 0,
                'message' => 'Thêm mới nhân viên thất bại: ' . $e->getMessage(),
            ], 500);
        }
    }

    // Lấy dữ liệu nhân viên
    public function getData()
    {
        try {
            $data = NhanVien::all();

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

    // Cập nhật thông tin nhân viên
    public function update(NhanVienUpdateRequest $request, $id)
    {
        try {
            $nhanVien = NhanVien::findOrFail($id);

            $data = $request->validated();

            $nhanVien->fill($data);
            $nhanVien->save();

            return response()->json([
                'status'  => 1,
                'message' => 'Cập nhật thông tin nhân viên thành công.',
                'data'    => $nhanVien,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 0,
                'message' => 'Cập nhật thất bại: ' . $e->getMessage(),
            ], 500);
        }
    }

    // Xóa nhân viên
    public function delete(NhanVienDeleteRequest $request, $id)
    {
        $nhanVien = NhanVien::findOrFail($id);
        $nhanVien->delete();
        return response()->json([
            'status'  => 1,
            'message' => 'Xóa người dùng thành công.',
        ]);
    }


    public function login(Request $request)
    {
        $user = NhanVien::where('email', $request->email)->first();

        if ($user && $user->mat_khau == $request->mat_khau) {
            return response()->json([
                'status'    => 1,
                'message'   => 'Đăng nhập thành công',
                'key'       => $user->createToKen('key_admin')->plainTextToken,
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Tài khoản hoặc mật khẩu không đúng'
            ]);
        }
    }

    public function search(Request $request)
    {
        $noi_dung = $request->input('noi_dung');
        $data = NhanVien::where('ten_nhan_vien', 'like', '%' . $noi_dung . '%')->get();

        return response()->json([
            'status' => 1,
            'data'   => $data,
        ]);
    }
    public function checkLogin(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        if($user && $user instanceof \App\Models\NhanVien )  {
            return response()->json([
                'status' => 1,
            ]);
        }
    }

}
