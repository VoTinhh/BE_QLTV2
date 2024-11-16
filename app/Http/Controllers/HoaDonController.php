<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class HoaDonController extends Controller
{
    // Lấy tất cả các hóa đơn
    public function getData()
    {
        $hoaDons = HoaDon::get(); // Lấy tất cả hóa đơn

        return response()->json([
            'hoa_dons' => $hoaDons,
        ]);
    }

    // Tạo mới một hóa đơn
    public function create(Request $request)
    {
        try {
            $hoaDon = HoaDon::create([
                'tong_tien'    => $request->tong_tien,
                'trang_thai'   => $request->trang_thai,
                'id_phieu_muon'=> $request->id_phieu_muon,
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
            ]);
        }
    }

    // Cập nhật hóa đơn
    public function update(Request $request, $id)
    {
        try {
            $hoaDon = HoaDon::findOrFail($id);
            $hoaDon->update([
                'tong_tien'    => $request->tong_tien,
                'trang_thai'   => $request->trang_thai,
                'id_phieu_muon'=> $request->id_phieu_muon,
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
