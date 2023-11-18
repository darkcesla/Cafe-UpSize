<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class DaftarStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function do_register(Request $request)
    {
        $request->validate([
            'namalengkap' => 'required|min:10|max:50',
            'username' => [
                'required',
                'unique:users,username',
                'alpha',
                'min:3',
                'max:20',
                'not_in:admin,superuser'
            ],
            'nomorhp' => 'required|numeric|min:12',
            'email' => 'required|Unique:users|email:dns',
            'password' => 'required|min:8|max:16',
            'role' => 'staff'
        ]);

        $staff = new User;
        $staff->namalengkap = $request->namalengkap;
        $staff->username = $request->username;
        $staff->nomorhp = $request->nomorhp;
        $staff->email = $request->email;
        $staff->password = Hash::make($request->password);
        $staff->role = 'staff';
        // dd($request->all());
        $staff->save();
        return redirect('/auth')->with('success', 'Selamat Anda Berhasil Melakukan Registrasi');
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
        //
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
