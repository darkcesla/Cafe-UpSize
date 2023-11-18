<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use App\Models\KritikSaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class KritikSaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kritiksaran' => 'required'
        ], [
            'kritiksaran.required' => 'Anda harus mengisi pesan terlebih dahulu.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $kritiksaran = new Kritiksaran();
        $kritiksaran->user_id = auth()->user()->id;
        $kritiksaran->kritiksaran = $request->input('kritiksaran');
        $kritiksaran->save();

        return redirect()->back()->with('success', 'Anda berhasil mengirimkan Kritik dan Saran terhadap Cafe UpSize.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
