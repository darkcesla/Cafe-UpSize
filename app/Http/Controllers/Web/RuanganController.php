<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Meja;
use App\Http\Controllers\Controller;

class RuanganController extends Controller
{
    public function index(Request $request)
    {
        $meja = Meja::paginate(7);
        return view('pages.web.ruangan.main', compact('meja'));
    }
    public function search(Request $request)
{
    if ($request->has('search')) {
        $keyword = $request->search;
        $meja = Meja::where('meja', 'like', '%' . $keyword . '%')->paginate(8);

        if ($meja->isEmpty()) {
            $message = 'Nomor meja dengan kata kunci "' . $keyword . '" tidak tersedia.';
            return view('pages.web.ruangan.main', compact('meja', 'message'));
        }

        return view('pages.web.ruangan.main', compact('meja'));
    } else {
        $meja = Meja::all();
        return view('pages.web.ruangan.main', compact('meja'));
    }
}

}
