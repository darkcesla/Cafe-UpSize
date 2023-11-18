<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PDF;


class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pengaduan = DB::table('pengaduans')
                ->join('users', 'users.id', '=', 'pengaduans.user_id')
                ->select('pengaduans.*', 'users.namalengkap')
                ->paginate(3);
            // dd('pengaduans');
            return view('pages.admin.pengaduan.list', compact('pengaduan'));
        }
        $pengaduan = Pengaduan::all();
        return view('pages.admin.pengaduan.main', ['pengaduan' => $pengaduan]);
    }

    public function show()
    {

        $pengaduan = Pengaduan::all(); // Ganti dengan model dan query yang sesuai dengan data history meja Anda

        $pdf = PDF::loadView('pages.admin.pengaduan.pdf', compact('pengaduan'));

        return $pdf->download('history_pengaduan.pdf');
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Pengaduan yang disampaikan oleh User berhasil dihapus',
        ]);
    }
}
