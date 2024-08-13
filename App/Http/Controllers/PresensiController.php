<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Impor facade Storage
use Illuminate\Support\Facades\Auth; // Impor facade Auth
use Illuminate\Support\Facades\DB; // Impor facade DB

class PresensiController extends Controller
{
    public function create()
    {
        return view('presensi.create');
    }

    public function store(Request $request)
    {
        $NUPTK = Auth::guard('guru')->user()->NUPTK;
        $tgl_presensi = date("Y-m-d");
        $jam = date("H:i:s");
        $lokasi = $request->lokasi;
        $image = $request->image;
        $folderPath = "public/upload/absensi/";
        $formatName = $NUPTK . "-" . $tgl_presensi;
        $image_parts = explode(";base64,", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . ".png" ;
        $file = $folderPath . $fileName;
        $data = [
            'NUPTK' => $NUPTK,
            'tgl_presensi' => $tgl_presensi,
            'jam_masuk' => $jam,
            'foto_masuk' => $fileName,
            'lokasi_masuk' => $lokasi,
        ];
        $simpan = DB::table('presensi')->insert($data);
        if ($simpan){
            echo 0;
            Storage::put($file, $image_base64);
        } else {
            echo 1;
        }
    }
}
