<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Liquid;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PenilaianController extends Controller
{

    public function cekRoom(Request $request)
    {
        $liquid = Liquid::where('code', $request->code)->first();
        if (!$liquid) {
            return response()->json(['message' => 'Room tidak ditemukan, silakan cek kembali kodenya'], 404);
        } else {
            if (!$liquid->isOpen) {
                return response()->json(['message' => 'Room sudah ditutup'], 200);
            }
            if ($liquid->id_target === Auth::user()->id) {
                return response()->json(['message' => 'Anda tidak dapat menilai diri anda sendiri'], 403);
            } else {
                return response()->json(true, 200);
            }
        }
    }


    public function create(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'code' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        // Cek apakah room ada
        $room = Liquid::where([
            ['code', '=', $request->code],
            ['isOpen', '=', true],
        ])->first();

        if ($room) {
            $input = new Penilaian([
                'code' => $request->code,
                'id_penilai' => Auth::user()->id,
                'kelebihan' => $request->kelebihan,
                'catatan_kelebihan' => $request->catatan_kelebihan,
                'kekurangan' => $request->kekurangan,
                'catatan_kekurangan' => $request->catatan_kekurangan,
                'saran' => $request->saran,
                'harapan' => $request->harapan,
                'tiga_kata' => $request->tiga_kata,
            ]);
            $kelebihan = explode(',', $request->kelebihan);
            $output = [];
            foreach ($kelebihan as $k) {
                $output = Category::where('id', $k)->first()->keterangan;
            }
            // for ($i = 0; $i < count($kelebihan); $i++) {
            // }
            return response()->json($output);
        } else {
            return response("Room doesn't exist");
        }
    }
}
