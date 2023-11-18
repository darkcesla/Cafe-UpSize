<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\If_;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except('do_logout');
    }
    public function login()
    {
        return view('pages.auth.login');
    }
    public function register()
    {
        return view('pages.auth.register');
    }
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
            'email' =>'required|Unique:users|email:dns',
            'password' => 'required|min:8|max:16',
        ]);

        $user = new User;
        $user->namalengkap = $request->namalengkap;
        $user->username = $request->username;
        $user->nomorhp = $request->nomorhp;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'user';
        // dd($request->all());
        $user->save();
        return redirect('/auth')->with('success', 'Selamat Anda Berhasil Melakukan Registrasi');
    }

    public function do_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $request->email)->first();
        $pass = User::all();
        $stat = 0;

        foreach($pass as $p){
            if (Hash::check($request->password, $p->password)) {
                $stat = 1;
                break;
            }
        }

        if (!Auth::attempt($credentials)) {
            if (!$user && !$stat) {
                return back()->with('error', 'Email dan password yang Anda masukkan salah!');
            } else if (!$user && $stat) {
                return back()->with('error', 'Email yang Anda masukkan salah atau tidak terdaftar!');
            }else{
                return back()->with('error', 'Password yang Anda masukkan salah!');
            }
            
        }

        if ($user->role == 'admin') {
            return redirect()->intended('admin/dashboard')->with('success', 'Selamat Datang ' . $user->username);
        } elseif ($user->role == 'staff') {
            return redirect()->intended('staff/dashboard')->with('success', 'Selamat Datang ' . $user->username);
        } elseif ($user->role == 'user') {
            return redirect()->intended('/')->with('success', 'Selamat Datang ' . $user->username);
        }

        return back()->with('error', 'Terjadi kesalahan dalam proses login.');
    }     

    public function do_logout()
    {
        $user = Auth ::user();
        Auth::logout($user);
        return redirect('auth')->with('success', 'Anda Telah Berhasil Logout');
    }
}