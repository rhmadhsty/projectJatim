<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
                'data' => Siswa::where('siswa_id', auth()->user()->siswa_id)->with('siswaKelas')->first(),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'error' => $th
            ], 422);
        }
    }

    // change password
    public function changePass(Request $request)
    {
        try {

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->fails(),
                'error' => $validator->errors()
            ], 422);
        }

        $user = $request->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['message' => 'Password saat ini tidak sesuai'], 401);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'message' => 'Password berhasil diubah'
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
            auth()->user()->tokens()->delete();
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
