<?php

namespace App\Http\Controllers;

use App\Models\NhaXuatBan;
use Illuminate\Http\Request;

class NhaXuatBanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function getData()
    {
        $data = NhaXuatBan::get(); // Lấy tất cả hóa đơn

        return response()->json([
            'data' => $data
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        NhaXuatBan::create([
            'ten_nha_xuat_ban'         => $request->ten_nha_xuat_ban,

        ]);
        return response()->json([
            'status' => true,
            'message' => "Đã tạo mới nhà xuất bản  " . $request->ten_nha_xuat_ban . " thành công.",
        ]);
    }
    public function update(Request $request, NhaXuatBan $nhaXuatBan)
    {
        NhaXuatBan::find($request->id)->update([
            'ten_nha_xuat_ban'         => $request->ten_nha_xuat_ban,
        ]);
        return response()->json([
            'status' => true,
            'message' => "Đã update nhà xuất bản" . $request->ten_nha_xuat_ban . " thành công.",
        ]);
    }

    public function destroy(Request $request)
    {
        NhaXuatBan::find($request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => "Đã xóa nhà xuất bản" . $request->ten_nha_xuat_ban . " thành công.",
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(NhaXuatBan $nhaXuatBan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NhaXuatBan $nhaXuatBan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

}
