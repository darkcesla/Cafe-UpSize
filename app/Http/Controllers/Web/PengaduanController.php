<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pengaduan' => 'required',
            'namamenu' => 'required',
            'kategori'  => 'required'

        ], [
            'pengaduan.required' => 'Anda harus mengisi pesan terlebih dahulu.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pengaduan = new Pengaduan();
        $pengaduan->user_id = auth()->user()->id;
        $pengaduan->pengaduan = $request->input('pengaduan');
        $pengaduan->namamenu = $request->input('namamenu');
        $pengaduan->kategori = $request->input('kategori');
        $pengaduan->save();

        return redirect()->back()->with('success', 'Anda berhasil mengirimkan Pengaduan Makanan & Minuman terhadap Cafe UpSize.');
    }
}
