<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\NguoiDung;
use App\Models\PhieuMuon;
use App\Models\Sach;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class HoaDonController extends Controller
{
    public function getData()
    {
        // Lấy danh sách hóa đơn kèm thông tin từ các bảng liên quan
        $hoaDons = HoaDon::with([
            'phieuMuon' => function ($query) {
                $query->select('id', 'ngay_muon', 'ngay_tra', 'id_sach', 'id_nguoi_dung');
            },
            'phieuMuon.sach' => function ($query) {
                $query->select('id_sach', 'ten_sach', 'so_luong');
            },
            'phieuMuon.nguoiDung' => function ($query) {
                $query->select('id_nguoi_dung', 'ten_nguoi_dung');
            }
        ])->get();

        // Trả về dữ liệu dạng JSON
        return response()->json([
            'hoa_dons' => $hoaDons,
        ]);
    }
    public function create(Request $request)
    {
        try {
            // Kiểm tra xem phieu_muon có tồn tại không
            $phieuMuon = PhieuMuon::find($request->id_phieu_muon);
            if (!$phieuMuon) {
                return response()->json([
                    'status' => false,
                    'message' => 'Không tìm thấy phiếu mượn.',
                ], 404);
            }
    
            // Tạo mới hóa đơn
            $hoaDon = HoaDon::create([
                'trang_thai' => $request->trang_thai,
                'id_thanh_toan' => $request->id_thanh_toan, // Thêm trường thanh toán
                'id_sach' => $phieuMuon->id_sach, // Lấy sách từ phiếu mượn
                'id_nguoi_dung' => $phieuMuon->id_nguoi_dung, // Lấy người dùng từ phiếu mượn
                'id_phieu_muon' => $request->id_phieu_muon,
            ]);
    
            return response()->json([
                'status' => true,
                'message' => 'Tạo mới hóa đơn thành công!',
                'hoa_don' => $hoaDon,
            ]);
        } catch (Exception $e) {
            Log::error("Lỗi tạo hóa đơn: ", [$e->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi khi tạo hóa đơn.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
    public function update(Request $request, $id)
    {
        try {
            $hoaDon = HoaDon::findOrFail($id);
            $hoaDon->update([
                'tong_tien'    => $request->tong_tien,
                'trang_thai'   => $request->trang_thai,
                'id_phieu_muon' => $request->id_phieu_muon,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Cập nhật hóa đơn thành công!',
                'hoa_don' => $hoaDon,
            ]);
        } catch (Exception $e) {
            Log::error("Lỗi cập nhật hóa đơn: ", [$e->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi khi cập nhật hóa đơn.',
            ]);
        }
    }

    // Xóa hóa đơn
    public function delete($id)
    {
        try {
            $hoaDon = HoaDon::findOrFail($id);
            $hoaDon->delete();

            return response()->json([
                'status' => true,
                'message' => 'Xóa hóa đơn thành công!',
            ]);
        } catch (Exception $e) {
            Log::error("Lỗi xóa hóa đơn: ", [$e->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi khi xóa hóa đơn.',
            ]);
        }
    }

    // Lấy dữ liệu chi tiết hóa đơn theo ID phiếu mượn
    public function getDataByPhieuMuon($id_phieu_muon)
    {
        $hoaDons = HoaDon::where('id_phieu_muon', $id_phieu_muon)->get();

        return response()->json([
            'hoa_dons' => $hoaDons,
        ]);
    }
}
