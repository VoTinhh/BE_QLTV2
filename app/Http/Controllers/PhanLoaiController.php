<?php

namespace App\Http\Controllers;

use App\Models\PhanLoai;
use Illuminate\Http\Request;

class PhanLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function getData()
    {
        $data = PhanLoai::get(); // Lấy tất cả hóa đơn

        return response()->json([
            'data' => $data
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PhanLoai::create([
            'ten_phan_loai'         => $request->ten_phan_loai,

        ]);
        return response()->json([
            'status' => true,
            'message' => "Đã tạo mới phân loại  " . $request->ten_phan_loai . " thành công.",
        ]);
    }
    public function update(Request $request, PhanLoai $phanLoai)
    {
        PhanLoai::find($request->id)->update([
            'ten_phan_loai'         => $request->ten_phan_loai,
        ]);
        return response()->json([
            'status' => true,
            'message' => "Đã update phân loại" . $request->ten_phan_loai . " thành công.",
        ]);
    }
    public function destroy(Request $request)
    {
        PhanLoai::find($request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => "Đã xóa phân loại" . $request->ten_phan_loai . " thành công.",
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(PhanLoai $phanLoai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhanLoai $phanLoai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */

}
