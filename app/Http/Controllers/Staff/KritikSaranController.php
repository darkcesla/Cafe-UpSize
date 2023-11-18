<?php

namespace App\Http\Controllers\Staff;

use App\Models\KritikSaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PDF;


class KritikSaranController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kritik = DB::table('kritiksaran')
                ->join('users', 'users.id', '=', 'kritiksaran.user_id')
                ->select('kritiksaran.*', 'users.namalengkap')
                ->paginate(3);
            return view('pages.staff.historykritik.list', compact('kritik'));
        }
        return view('pages.staff.historykritik.main');
    }

    public function show()
    {

        $kritik = KritikSaran::all(); // Ganti dengan model dan query yang sesuai dengan data history meja Anda

        $pdf = PDF::loadView('pages.staff.historykritik.pdf', compact('kritik'));

        return $pdf->download('history_kritik.pdf');
    }

    public function destroy($id)
    {
        $kritiksaran = KritikSaran::find($id);
        $kritiksaran->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Kritik dan Saran yang disampaikan oleh User berhasil dihapus',
        ]);
    }
}
