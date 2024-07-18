<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Master;
use App\Models\User;
use App\Models\File;

use DB;

class C_NpwpAdmin extends Controller
{
    public function npwp()
    {
        $file = File::OrderByDesc('created_at')->get();
        return view('npwpadmin.npwp', compact('file'));
    }

    public function downloadCombinedFiles($id_file)
    {
         // Temukan file berdasarkan id_file
    $file = File::where('id_file', $id_file)->firstOrFail(); // Gantikan File dengan model yang sesuai

    // Tentukan path file yang akan didownload
    $filePathZip = public_path('img/zip/' . $file->file_zip);
    $filePathExcel = public_path('img/excel/' . $file->file_excel);

    // Lakukan pengecekan ketersediaan file
    if (File::exists($filePathZip) && File::exists($filePathExcel)) {
        // Tentukan nama file untuk respons
        $zipFileName = basename($filePathZip);
        $excelFileName = basename($filePathExcel);

        // Lakukan pengiriman file zip
        return response()->download($filePathZip, $zipFileName);
    } else {
        abort(404, 'File not found');
    }
    }
}

