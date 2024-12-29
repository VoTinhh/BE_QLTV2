<?php

namespace App\Http\Controllers;

use App\Models\PhieuMuon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PhieuMuonController extends Controller
{
    public function getData(Request $request)
    {
        try {
            // Lấy id_nguoi_dung từ request (nếu có)
            DB::enableQueryLog();

            // Thêm điều kiện lọc nếu id_nguoi_dung được cung cấp
            $query = PhieuMuon::join('saches', 'saches.id_sach', '=', 'phieu_muons.id_sach')
                ->join('nguoi_dungs', 'nguoi_dungs.id', '=', 'phieu_muons.id_nguoi_dung')
                ->select('phieu_muons.*', 'saches.ten_sach', 'nguoi_dungs.ten_nguoi_dung')
                ->where('phieu_muons.id_nguoi_dung', $request->user()->id);

            $data = $query->get();

            Log::info(DB::getQueryLog());

            if ($data->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Không có phiếu mượn nào',
                ]);
            }

            return response()->json([
                'status' => true,
                'phieu_muon' => $data,
            ]);
        } catch (Exception $e) {
            Log::error("Error while fetching PhieuMuon data", ['error' => $e->getMessage()]);

            return response()->json([
                'status' => false,
                'message' => 'Không thể lấy danh sách phiếu mượn',
            ]);
        }
    }

    // Tìm kiếm phiếu mượn theo tên sách
    public function search(Request $request)
    {
        try {
            if ($request->has('ten_sach')) {
                $key = "%" . $request->ten_sach . "%";

                $data = PhieuMuon::whereHas('sach', function ($query) use ($key) {
                    $query->where('ten_sach', 'like', $key);
                })->get();

                return response()->json([
                    'status' => true,
                    'phieu_muon' => $data,
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Vui lòng cung cấp tên sách để tìm kiếm',
            ]);
        } catch (Exception $e) {
            Log::error("Lỗi khi tìm kiếm phiếu mượn", ['error' => $e->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi xảy ra khi tìm kiếm phiếu mượn',
            ]);
        }
    }




    // Tạo mới phiếu mượn
    public function create(Request $request)
    {
        try {
            Log::info("Dữ liệu đầu vào khi tạo phiếu mượn:", $request->all());

            $phieuMuon = PhieuMuon::create([
                'ngay_tra' => now()->subDay(7),
                'id_sach' => $request->id_sach,
                'ngay_muon' => now(),
                'id_nguoi_dung' => 1,
                'so_luong_sach' => 1 //ở giao diện truyền thêm trường so_luong_sach ve Be nữa à oke
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Đã tạo mới phiếu mượn thành công!',
                'phieu_muon' => $phieuMuon,
            ]);
        } catch (Exception $e) {
            Log::error("Lỗi khi tạo mới phiếu mượn", [
                'error' => $e->getMessage(),
                'request' => $request->all()
            ]);
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi xảy ra khi tạo mới phiếu mượn',
            ]);
        }
    }



    // Xóa phiếu mượn theo ID
    public function delete($id)
    {
        try {
            PhieuMuon::findOrFail($id)->delete();

            return response()->json([
                'status' => true,
                'message' => 'Xóa phiếu mượn thành công!',
            ]);
        } catch (Exception $e) {
            Log::error("Lỗi khi xóa phiếu mượn", ['error' => $e->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi xảy ra khi xóa phiếu mượn',
            ]);
        }
    }

    // Cập nhật phiếu mượn
    public function update(Request $request, $id)
    {
        $PhieuMuon = PhieuMuon::findOrFail($id)->update([
            'ngay_muon' => $request->ngay_muon,
            'ngay_tra' => $request->ngay_tra,
            'id_sach' => $request->id_sach,
            'id_nguoi_dung' => $request->user()->id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật hóa đơn thành công!',
            'hoa_don' => $PhieuMuon,
        ]);
    }
}
