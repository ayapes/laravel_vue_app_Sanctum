<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Http\Requests\Auth\LoginRequest;
// use Illuminate\Auth\AuthenticationException;
// use Illuminate\Auth\AuthManager;
// use Illuminate\Http\JsonResponse;

final class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credential)) {
            // sessionIDを（再）生成する
            $request->session()->regenerate();

            return response()->json([
                'message' => 'ログインしました',
            ]);
        }

        return response()->json([
            'message' => 'メールアドレスまたはパスワードが間違っています',
        ], 401);
    }
}
