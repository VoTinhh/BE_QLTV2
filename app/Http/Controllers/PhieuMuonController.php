<?php

namespace App\Http\Controllers;

use App\Models\PhieuMuon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PhieuMuonController extends Controller
{
    // // Lấy danh sách phiếu mượn và thông tin sách
    // public function getData()
    // {
    //     $listPhieuMuon = phieu_muon::get();
    //     $listSach = DB::table('sachs')->get();

    //     return response()->json([
    //         'listPhieuMuon' => $listPhieuMuon,
    //         'listSach' => $listSach,
    //     ]);
    // }

    // // Hiển thị trang quản lý phiếu mượn
    // public function index()
    // {
    //     return view('phieu_muon');
    // }

    // Lấy danh sách tất cả phiếu mượn
    public function getData()
    {
        $data = PhieuMuon::get();

        return response()->json([
            'phieu_muon' => $data,
        ]);
    }

    // Tìm kiếm phiếu mượn theo tên sách
    public function search(Request $request)
    {
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
    }
    

    // Tạo mới phiếu mượn
    public function create(Request $request)
    {
        PhieuMuon::create([
            'ngay_muon' => $request->ngay_muon,
            'ngay_tra' => $request->ngay_tra,
            'id_sach' => $request->id_sach,
            'id_user' => $request->id_user,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Đã tạo mới phiếu mượn thành công!',
        ]);
    }

    // Xóa phiếu mượn theo ID
    public function delete($id)
    {
        try {
            PhieuMuon::where('id', $id)->delete();
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
    public function update(Request $request)
    {
        try {
            PhieuMuon::where('id', $request->id)
                ->update([
                    'ngay_muon' => $request->ngay_muon,
                    'ngay_tra' => $request->ngay_tra,
                    'ngay_tra_thuc_te' => $request->ngay_tra_thuc_te,
                    'tien_phat' => $request->tien_phat,
                ]);

            return response()->json([
                'status' => true,
                'message' => 'Đã cập nhật thành công phiếu mượn ' . $request->id,
            ]);
        } catch (Exception $e) {
            Log::error("Lỗi khi cập nhật phiếu mượn", ['error' => $e->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi xảy ra khi cập nhật phiếu mượn',
            ]);
        }
    }
}
