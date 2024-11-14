<?php

namespace App\Http\Controllers;

use App\Models\LichSuMuon;
use App\Models\PhieuMuon;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class LichSuMuonController extends Controller
{
    public function getData()
    {
        try {
            $lichSuMuons = LichSuMuon::all();

            return response()->json([
                'lich_su_muons' => $lichSuMuons,
            ]);
        } catch (Exception $e) {
            Log::error("Lỗi lấy dữ liệu lịch sử mượn: ", [$e->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi khi lấy dữ liệu lịch sử mượn.',
            ]);
        }
    }

    public function create(Request $request)
    {
        try {
            if (!$request->has('id_phieu_muon') || empty($request->id_phieu_muon)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Thiếu id_phieu_muon.',
                ]);
            }

            $phieuMuon = PhieuMuon::find($request->id_phieu_muon);
            if (!$phieuMuon) {
                return response()->json([
                    'status' => false,
                    'message' => 'Phiếu mượn không tồn tại.',
                ]);
            }

            $lichSuMuon = LichSuMuon::create([
                'id_phieu_muon' => $request->id_phieu_muon,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Tạo mới lịch sử mượn thành công!',
                'lich_su_muon' => $lichSuMuon,
            ]);
        } catch (Exception $e) {
            Log::error("Lỗi tạo lịch sử mượn: ", [$e->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi khi tạo lịch sử mượn.',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $lichSuMuon = LichSuMuon::findOrFail($id);
            $lichSuMuon->update([
                'id_phieu_muon' => $request->id_phieu_muon,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Cập nhật lịch sử mượn thành công!',
                'lich_su_muon' => $lichSuMuon,
            ]);
        } catch (Exception $e) {
            Log::error("Lỗi cập nhật lịch sử mượn: ", [$e->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi khi cập nhật lịch sử mượn.',
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $lichSuMuon = LichSuMuon::findOrFail($id);
            $lichSuMuon->delete();

            return response()->json([
                'status' => true,
                'message' => 'Xóa lịch sử mượn thành công!',
            ]);
        } catch (Exception $e) {
            Log::error("Lỗi xóa lịch sử mượn: ", [$e->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi khi xóa lịch sử mượn.',
            ]);
        }
    }

    public function getDataByPhieuMuon($id_phieu_muon)
    {
        try {
            $lichSuMuons = LichSuMuon::where('id_phieu_muon', $id_phieu_muon)->get();

            return response()->json([
                'lich_su_muons' => $lichSuMuons,
            ]);
        } catch (Exception $e) {
            Log::error("Lỗi lấy lịch sử mượn theo ID phiếu mượn: ", [$e->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi khi lấy dữ liệu lịch sử mượn.',
            ]);
        }
    }
}
