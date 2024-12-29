<?php

namespace App\Http\Controllers;

use App\Http\Requests\NguoiDungCreateRequest;
use App\Http\Requests\NguoiDungDangKyRequest;
use App\Http\Requests\NguoiDungDeleteRequest;
use App\Http\Requests\NguoiDungUpdateRequest;
use App\Models\Client;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class NguoiDungController extends Controller
{
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

    public function oke(Request $request)
    {
        try {
            return response()->json([
                'data'  => $request->user(),
            ], 200);
        } catch (\Throwable $th) {
           Log::error($th->getMessage());
        }
    }

    public function update(NguoiDungUpdateRequest $request)
    {
        try {
            $nguoiDung = NguoiDung::findOrFail($request->user()->id);

            $data = $request->validated();

            $nguoiDung->update($data);

            return response()->json([
                'status'  => 1,
                'message' => 'Cập nhật thông tin người dùng thành công.',
                'data'    => $nguoiDung,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 0,
                'message' => 'Cập nhật thất bại: ' . $e->getMessage(),
            ], 500);
        }
    }

    // Xóa người dùng
    public function delete(NguoiDungDeleteRequest $request, $id)
    {
        $nguoiDung = NguoiDung::findOrFail($id);
        $nguoiDung->delete();
        return response()->json([
            'status'  => 1,
            'message' => 'Xóa người dùng thành công.',
        ]);
    }

    public function dangXuat(Request $request)
    {
        try {
            Auth::logout();

            return response()->json([
                'status' => 1,
                'message' => 'Đăng xuất thành công',
            ]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json([
                'status' => 0,
                'message' => 'áđá công',
            ]);
        }
    }

    public function login(Request $request)
    {
        $user = NguoiDung::where('email', $request->email)->first();

        if ($user && Auth::attempt(['email' => $request->email, 'password' => $request->mat_khau])) {
            return response()->json([
                'status' => 1,
                'user'   => $user,
                'token'   => Auth::user()->createToken('key_nguoi_dung')->plainTextToken,
                'message' => 'Đăng nhập thành công',
            ]);
        }
        return response()->json([
            'status'  => 0,
            'message' => 'Tài khoản hoặc mật khẩu không đúng',
        ]);
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'mat_khau');
    //     if (Auth::attempt($credentials)) {
    //         return response()->json([
    //             'status' => 1,
    //             'message' => 'Đăng nhập thành công',
    //             'key' => Auth::user()->createToken('key_nguoi_dung')->plainTextToken, // Tạo token nếu sử dụng Sanctum
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => 0,
    //             'message' => 'Tài khoản hoặc mật khẩu không đúng',
    //         ]);
    //     }
    // }


    public function store(NguoiDungDangKyRequest $request)
    {
        NguoiDung::create([
            'ten_nguoi_dung'     => $request->ten_nguoi_dung,
            'email'         => $request->email,
            'so_dien_thoai'      => $request->so_dien_thoai,
            'dia_chi' => $request->dia_chi,
            'password'     => bcrypt($request->mat_khau),
            'hinh_anh'     => $request->hinh_anh,
        ]);
        return response()->json([
            'status'  => 1,
            'message' => 'Bạn Đăng Ký Tài Khoản  ' . $request->email . '  Thành Công'
        ]);
    }

    public function search(Request $request)
    {
        $noi_dung = $request->input('noi_dung');
        $data = NguoiDung::where('ten_nguoi_dung', 'like', '%' . $noi_dung . '%')->get();

        return response()->json([
            'status' => 1,
            'data'   => $data,
        ]);
    }

    public function checkLogin(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        if ($user && $user instanceof \App\Models\NguoiDung) {
            return response()->json([
                'status' => 1,
                'name'   => $user->ten_nguoi_dung,
                'email'  => $user->email,
            ]);
        }
    }
}
