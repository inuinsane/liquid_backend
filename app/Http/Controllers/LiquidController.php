<?php

namespace App\Http\Controllers;

use App\Models\Liquid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LiquidController extends Controller
{
    public function createRoom()
    {
        // unique code for the room (maximum 6 characters)
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $code = '';
        for ($i = 0; $i < 6; $i++) {
            $code .= $characters[rand(0, $charactersLength - 1)];
        }

        $target = Auth::user();
        $room = new Liquid([
            'code' => $code,
            'id_target' => $target->id,
            'isOpen' => true,
        ]);
        $room->save();
        return response()->json($room, 200);
    }

    public function closeRoom(Request $request)
    {
        // Cek user yang sedang login
        $curretUser = Auth::user();

        // Check if room is exist
        $code = $request->code;
        $room = DB::table('liquid')->where([
            ['code', '=', $code],
            ['isOpen', '=', true],
        ])->first();

        if (!$room) {
            return response()->json('Room tidak ditemukan atau sudah ditutup', 404);
        } else {
            if ($curretUser->id === $room->id_target) {
                DB::table('liquid')->where('code', $code)->update(['isOpen' => false]);
                return response()->json([
                    'message' => 'Room dengan code: `' . $code . '` berhasil ditutup.',
                ], 201);
            } else {
                return response()->json([
                    'message' => 'Anda tidak memiliki akses untuk menutup room ini',
                ], 403);
            }
        }
    }
}
