<?php

namespace App\Http\Controllers;

use App\Models\ThanhToan;
use App\Models\HoaDon;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class ThanhToanController extends Controller
{
    // Lấy tất cả các thanh toán
    public function getData()
    {
        $thanhToans = ThanhToan::get(); // Lấy tất cả thanh toán

        return response()->json([
            'thanh_toans' => $thanhToans,
        ]);
    }

    // Tạo mới thanh toán
    public function create(Request $request)
    {
        try {
            // Kiểm tra thông tin hợp lệ
            if (!$request->has('so_tien') || !$request->has('phuong_thuc_thanh_toan') || !$request->has('id_hoa_don')) {
                return response()->json([
                    'status' => false,
                    'message' => 'Thông tin yêu cầu không hợp lệ.',
                ]);
            }

            // Tạo mới thanh toán
            $thanhToan = ThanhToan::create([
                'so_tien' => $request->so_tien,
                'phuong_thuc_thanh_toan' => $request->phuong_thuc_thanh_toan,
                'id_hoa_don' => $request->id_hoa_don,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Thanh toán đã được tạo thành công.',
                'thanh_toan' => $thanhToan,
            ]);
        } catch (Exception $e) {
            // Log lỗi chi tiết
            Log::error("Lỗi khi tạo thanh toán: " . $e->getMessage());
            
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi khi tạo thanh toán.',
            ]);
        }
    }

    // Cập nhật thanh toán
    public function update(Request $request, $id)
    {
        try {
            $thanhToan = ThanhToan::findOrFail($id);
            $thanhToan->update([
                'so_tien' => $request->so_tien,
                'phuong_thuc_thanh_toan' => $request->phuong_thuc_thanh_toan,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thanh toán thành công!',
                'thanh_toan' => $thanhToan,
            ]);
        } catch (Exception $e) {
            Log::error("Lỗi cập nhật thanh toán: ", [$e->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi khi cập nhật thanh toán.',
            ]);
        }
    }

    // Xóa thanh toán
    public function delete($id)
    {
        try {
            $thanhToan = ThanhToan::findOrFail($id);
            $thanhToan->delete();

            return response()->json([
                'status' => true,
                'message' => 'Xóa thanh toán thành công!',
            ]);
        } catch (Exception $e) {
            Log::error("Lỗi xóa thanh toán: ", [$e->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi khi xóa thanh toán.',
            ]);
        }
    }

    // Tạo QR Code cho Momo
    private function generateMomoQRCode($thanhToan)
    {
        // Đây là logic giả lập cho QR Momo, trong thực tế bạn sẽ sử dụng API Momo để tạo QR
        $momoUrl = "https://www.momo.vn/pay?amount=" . $thanhToan->so_tien . "&order_id=" . $thanhToan->id;
        return $this->generateQRCode($momoUrl);
    }

    // Tạo QR Code cho Ngân Hàng
    private function generateBankQRCode($thanhToan)
    {
        // Đây là logic giả lập cho QR Ngân Hàng, trong thực tế bạn sẽ sử dụng API Ngân Hàng để tạo QR
        $bankUrl = "https://www.bank.vn/pay?amount=" . $thanhToan->so_tien . "&order_id=" . $thanhToan->id;
        return $this->generateQRCode($bankUrl);
    }

    // Hàm chung để tạo QR Code
    private function generateQRCode($url)
    {
        // Logic để tạo QR code từ URL. Bạn có thể sử dụng thư viện như "endroid/qr-code"
        // Đây là ví dụ đơn giản, bạn sẽ cần tích hợp thư viện QR Code trong Laravel để tạo mã QR

        // Ví dụ trả về QR code dạng URL (trong thực tế bạn sẽ trả về hình ảnh hoặc mã QR)
        return "QR code generated for URL: " . $url;
    }
}
