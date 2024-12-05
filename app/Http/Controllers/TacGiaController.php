<?php

namespace App\Http\Controllers;

use App\Models\TacGia;
use Illuminate\Http\Request;

class TacGiaController extends Controller
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
        $data = TacGia::get();

        return response()->json([
            'data' => $data
        ]);
    }
    public function store(Request $request)
    {
        TacGia::create([
           'ten_tac_gia'         => $request->ten_tac_gia,
           'tieu_su'     => $request->tieu_su,
           'hinh_anh'   => $request->hinh_anh,

           'tac_pham'    => $request->tac_pham,

        ]);
        return response()->json([
            'status' => true,
            'message' => "Đã tạo mới tác giả  " . $request->ten_tac_gia . " thành công.",
        ]);
    }
    public function update(Request $request, TacGia $tacGia)
    {
        TacGia::find($request->id)->update([
            'ten_tac_gia'         => $request->ten_tac_gia,
           'tieu_su'     => $request->tieu_su,
           'hinh_anh'   => $request->hinh_anh,

           'tac_pham'    => $request->tac_pham,
        ]);
        return response()->json([
            'status' => true,
            'message' => "Đã update tác giả" . $request->ten_tac_gia . " thành công.",
        ]);
    }
    public function destroy(Request $request)
    {
        TacGia::find($request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => "Đã xóa nhà tác giả" . $request->ten_tac_gia . " thành công.",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TacGia $tacGia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TacGia $tacGia)
    {
        //
    }


}
