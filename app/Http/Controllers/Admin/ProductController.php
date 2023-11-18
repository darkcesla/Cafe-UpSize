<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $product = Product::where('title', 'like', '%' . $request->keyword . '%')
                ->orWhere('description', 'like', '%' . $request->keyword . '%')
                ->orWhere('price', 'like', '%' . $request->keyword . '%')
                ->orWhere('stock', 'like', '%' . $request->keyword . '%')
                ->orWhere('category', 'like', '%' . $request->keyword . '%')
                ->paginate(8);  
            return view('pages.admin.food.list', compact('product'));
        }
        return view('pages.admin.food.main');
    }

    public function create()
    {
        return view('pages.admin.food.input', ['data' => new Product]);
    }

    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('title')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('title'),
                ]);
            } elseif ($errors->has('category')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('category'),
                ]);
            } elseif ($errors->has('description')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('description'),
                ]);
            } elseif ($errors->has('price')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('price'),
                ]);
            } elseif ($errors->has('stock')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('stock'),
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
        $file->move('images/produk', $filename);

        Product::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover' => $filename,
        ]);
        // dd(request());
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Menambahkan Makanan/Minuman Baru',
            'redirect' => route('admin.food.index')
        ]);
    }

    public function show(Product $food)
    {
        return view('pages.admin.food.show', ['data' => $food]);
    }

    public function edit(Product $food)
    {
        return view('pages.admin.food.input', ['data' => $food]);
    }

    public function update(Request $request, Product $food)
    {   
        $validators = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:products,title,' . $food->id,
            'category' => 'required',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('title')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('title'),
                ]);
            } elseif ($errors->has('category')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('category'),
                ]);
            } elseif ($errors->has('description')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('description'),
                ]);
            } elseif ($errors->has('price')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('price'),
                ]);
            } elseif ($errors->has('stock')) {
                return response()->json([
                    'status' => 'error',
                    'message' => $errors->first('stock'),
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
        $file->move('images/produk', $filename);

        $food->update([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover' => $filename,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Mengedit Makanan/Minuman',
            'redirect' => route('admin.food.index')
        ]);
    }

    public function destroy(Product $food)
    {
        $file = public_path('images/produk/' . $food->cover);
        if (file_exists($file)) {
            unlink($file);
        }

        $food->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Menghapus Makanan/Minuman',
        ]);
    }
}