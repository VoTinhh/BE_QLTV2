<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkNguoiDungMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('sanctum')->user();
        if($user && $user instanceof \App\Models\NguoiDung )  {


        return $next($request);
        } else {
            return response()->json([
                'message' => 'Bạn cần đăng nhập để thực hiện chức năng này'
            ]);
        }
    }
}
