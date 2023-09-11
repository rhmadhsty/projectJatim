<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // login function
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->fails()
            ], 401);
        }

        if (!Auth::guard('api')->attempt($request->only('username', 'password'))) {
            return response()->json([
                'message' => 'Creadentials'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'data' => auth('api')->user(),
            'token' => auth('api')->user()->createToken('apiToken')->plainTextToken
        ], 200);
    }

    // profile
    public function profile()
    {
        try {
            return response()->json([
                'success' => true,
                'data' => Siswa::where('siswa_id', auth('api')->user()->siswa_id)->first(),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'error' => $th
            ], 422);
        }
    }

    // logout
    public function logout()
    {
        try {
            auth('api')->user()->tokens()->delete();
            return response()->json([
              'success' => true,
              'message' => 'Logout successfully'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
              'success' => false,
                'error' => $th
            ], 422);
        }
    }
}
