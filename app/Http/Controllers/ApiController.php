<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public $successStatus = 200;

    public function login(Request $request)
    {
        // validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }


        $username = User::where('username', $request->username)->first('username');
        // if ($username) {
        //     return response()->json($username);
        // } else {
        //     return response()->json(['error' => 'Username tidak ditemukan']);
        // }

        if (!$username) {
            return response()->json(['error' => 'Akun belum terdaftar']);
        } else {
            if (Auth::attempt(['username' => request('username'), 'password' => request('password')])) {
                $user = Auth::user();
                $success = $user->createToken('Personal Access Token')->accessToken;
                return response()->json([
                    'user' => Auth::user(),
                    'token' => $success,
                ], $this->successStatus);
            } else {
                return response()->json(['error' => 'Kombinasi username dan password salah']);
            }
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'code' => Str::random(6),
        ];

        $input = $data;
        $input['password'] = Hash::make($request->password);
        $user = User::create($input);
        $success['token'] =  $user->createToken('nApp')->accessToken;
        $success['name'] =  $user->name;

        return response()->json(['success' => $success], $this->successStatus);
    }

    public function logout(Request $request)
    {
        $logout = $request->user()->token()->revoke();
        if ($logout) {
            return response()->json([
                'message' => 'Berhasil Log out'
            ]);
        }
    }

    public function user()
    {
        $user = Auth::user();
        if ($user) {
            return response()->json([
                'id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
            ]);
        } else {
            return response()->json(['Error! Silakan login kembali']);
        }
    }





    // public function register(Request $request)
    // {
    //     return response()->json([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'username' => $request->username,
    //         'password' => Hash::make($request->password),
    //     ], 200);
    // }

    // public function login(Request $request)
    // {
    //     return response()->json([
    //         'username' => $request->username,
    //         'password' => $request->password,
    //     ], 200);
    // }
}
