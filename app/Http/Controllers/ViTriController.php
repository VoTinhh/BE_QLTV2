<?php

namespace App\Http\Controllers;

use App\Models\ViTri;
use Illuminate\Http\Request;

class ViTriController extends Controller
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
        $data = ViTri::get(); // Lấy tất cả hóa đơn

        return response()->json([
            'data' => $data
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ViTri::create([
            'ten_vi_tri'         => $request->ten_vi_tri,

        ]);
        return response()->json([
            'status' => true,
            'message' => "Đã tạo mới vị trí  " . $request->ten_vi_tri . " thành công.",
        ]);
    }
    public function update(Request $request, ViTri $viTri)
    {
        ViTri::find($request->id)->update([
            'ten_vi_tri'         => $request->ten_vi_tri,
        ]);
        return response()->json([
            'status' => true,
            'message' => "Đã update vị trí" . $request->ten_vi_tri . " thành công.",
        ]);
    }
    public function destroy(Request $request)
    {
        ViTri::find($request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => "Đã xóa vị trí" . $request->ten_phan_loai . " thành công.",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ViTri $viTri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ViTri $viTri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

}
