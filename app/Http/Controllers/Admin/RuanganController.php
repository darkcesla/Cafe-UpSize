<?php

namespace App\Http\Controllers\Admin;

use App\Models\Meja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RuanganController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $ruangan = Meja::where('description', 'like', '%' . $request->keyword . '%')
                ->orWhere('meja', 'like', '%' . $request->keyword . '%')
                ->paginate(7);
            return view('pages.admin.ruangan.list', compact('ruangan'));
        }
        return view('pages.admin.ruangan.main');
    }

    public function create()
    {
        return view('pages.admin.ruangan.input', ['data' => new Meja]);
    }

    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'description' => 'required|string',
            'meja' => 'required|integer',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('description')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('description'),
                ]);
            } elseif ($errors->has('meja')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('meja'),
                ]);
            } elseif ($errors->has('cover')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('cover'),
                ]);
            }
        }

        $file = $request->file('cover');
        $filename = $file->getClientOriginalName();
        $file->move('images/meja', $filename);

        Meja::create([
            'description' => $request->description,
            'meja' => $request->meja,
            'cover' => $filename,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Menambahkan Meja',
            'redirect' => route('admin.ruangan.index')
        ]);
    }

    public function show(Meja $ruangan)
    {
        return view('pages.admin.ruangan.show', ['data' => $ruangan]);
    }

    public function edit(Meja $ruangan)
    {
        return view('pages.admin.ruangan.input', ['data' => $ruangan]);
    }

    public function update(Request $request, Meja $ruangan)
    {   
        $validators = Validator::make($request->all(), [
            'description' => 'required|string',
            'meja' => 'required|integer',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('description')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('description'),
                ]);
            } elseif ($errors->has('meja')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('meja'),
                ]);
            } elseif ($errors->has('cover')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('cover'),
                ]);
            }
        }

        $file = $request->file('cover');
        $filename = $file->getClientOriginalName();
        $file->move('images/meja', $filename);

        $ruangan  ->update([
            'description' => $request->description,
            'meja' => $request->meja,
            'cover' => $filename,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Mengedit Meja',
            'redirect' => route('admin.ruangan.index')
        ]);
    }

    public function destroy(Meja $ruangan)
    {
        $file = public_path('images/meja/' . $ruangan->cover);
        if (file_exists($file)) {
            unlink($file);
        }

        $ruangan  ->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Menghapus Meja',
        ]);
    }
}
