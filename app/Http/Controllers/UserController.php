<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function create(Request $request)
    {
        // 验证请求数据
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 创建用户
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['user' => $user, 'message' => 'User created successfully.'], 201);
    }

    public function login(Request $request)
    {


        // 验证请求参数
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|string|min:8'
        // ]);

        // 检查用户是否存在
        $user = User::where('email', $request->email)->first();

        // 验证用户密码
        if ($user && Hash::check($request->password, $user->password)) {
            // 创建 token

            // 返回成功响应
            return response()->json([
                'message' => '登录成功',
                'token_type' => 'Bearer',
                'user' => $user
            ], 200);
        } else {
            // 返回错误响应
            return response()->json(['message' => '邮箱或密码不正确'], 401);
        }
    }
}
