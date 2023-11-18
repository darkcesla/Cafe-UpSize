<?php

namespace App\Http\Controllers\Web;

use PDF;
use App\Helpers\Helper;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function customer(Request $request)
    {
        return view('pages.web.checkout.customer');
    }
    public function detail(Order $order)
    {
        return view('pages.web.checkout.detail', compact('order'));
    }

    public function updateCustomer(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'namalengkap' => 'required',
            'nomorhp' => 'required',
            'email' => 'required',
            'city' => 'required',
            'address' => 'required'
        ]);

        if ($validators->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validators->errors()->first(),
            ]);
        }

        $user = User::find(Auth::user()->id);
        $user->namalengkap = $request->namalengkap;
        $user->nomorhp = $request->nomorhp;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->address   = $request->address;
        $user->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data Anda berhasil di Update',
        ]);
    }

    public function payment()
    {
        return view('pages.web.checkout.payment');
    }

    public function checkout(Request $request)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $total = 0;
        // dd($request->payment);

        foreach ($cart as $c) {
            $total = $total + ($c->quantity * $c->product->price);
        }
        // if (strpos($request->payment, 'Cash')) {
        if ($request->payment == 'Dana (Fritz Marpaung | 89508081263632874)' || $request->payment == 'Mandiri (Fritz Marpaung | 1050016380549)' || $request->payment == 'BNI (Oswaldz Samuel Nababan | 1449535698)') {
            $validators = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($validators->fails()) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $validators->errors()->first(),
                ]);
            }
            $order = new Order();
            $order->code = Helper::IDGenerator();
            $order->user_id = Auth::user()->id;
            $order->total = $total;
            $order->payment = $request->payment;
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/bukti_pembayaran'), $filename);
            $order->image = $filename;
            $order->save();
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            foreach ($cart as $c) {
                $order_detail = new OrderDetail;
                $order_detail->order_id = $order->id;
                $order_detail->product_id = $c->product_id;
                $order_detail->quantity = $c->quantity;
                $order_detail->save();
                $product = Product::find($c->product_id);
                $product->stock = $product->stock - $c->quantity;
                $product->update();
            }
        } else {
            $order = new Order();
            $order->code = Helper::IDGenerator();
            $order->user_id = Auth::user()->id;
            $order->total = $total;
            $order->payment = $request->payment;
            $order->save();
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            foreach ($cart as $c) {
                $order_detail = new OrderDetail;
                $order_detail->order_id = $order->id;
                $order_detail->product_id = $c->product_id;
                $order_detail->quantity = $c->quantity;
                $order_detail->save();
                $product = Product::find($c->product_id);
                $product->stock = $product->stock - $c->quantity;
                $product->update();
            }
        }
        return response()->json([
            'alert' => 'success',
            'message' => 'Anda Berhasil Melakukan Pembayaran Makanan/Minuman',
            'id' => $order->id
        ]);
    }
    public function exportPDF($id)
    {
        $order = Order::find($id); // Ganti dengan model dan query yang sesuai dengan data history meja Anda

        $pdf = PDF::loadView('pages.web.checkout.pdf', compact('order'));

        return $pdf->download('struk_pesanan.pdf');
    }
}
