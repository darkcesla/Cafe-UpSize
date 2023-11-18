<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class OrderController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $order = Order::with('user')->paginate(3);
            return view('pages.admin.historyorder.list', compact('order'));
        }

        return view('pages.admin.historyorder.main');
    }

    public function exportPDF()
    {
        // dd('all');
        $order = Order::all();

        $pdf = PDF::loadView('pages.admin.historyorder.pdf', compact('order'));

        return $pdf->download('history_produk.pdf');
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Orderan Makanan/Minuman yang dilakukan oleh User berhasil di hapus',
            'redirect' => route('admin.historyorder.index')
        ]);;
    }

    public function accept($id)
    {
        $order = Order::find($id);
        $order->status = 'accepted';
        $order->pemberitahuan = 'Pesanan Anda dengan nomor ' . $order->code . ' Diterima! <br>
        Mohon Menunggu Pesanan Anda Segera Dibuat, <br> 
        dan Akan Segera Dikirimkan Ketempat Anda.';
        $order->update();
        return response()->json([
            'status' => 'success',
            'message' => 'Orderan Makanan/Minuman yang dilakukan oleh User di terima',
            'redirect' => route('admin.historyorder.index')
        ]);;
    }

    public function reject($id)
    {
        $order = Order::find($id);
        $order->status = 'rejected';
        $order->pemberitahuan = 'Pesanan Anda dengan nomor ' . $order->code . ' Ditolak! <br>
        Silahkan mengirimkan ulang bukti pembayaran yang benar.';
        $order->update();
        return response()->json([
            'status' => 'success',
            'message' => 'Orderan Makanan/Minuman yang dilakukan oleh User di tolak',
            'redirect' => route('admin.historyorder.index')
        ]);;
    }

    public function finish($id)
    {
        $order = Order::find($id);
        $order->status = 'finished';
        $order->pemberitahuan = 'Pesanan Anda dengan nomor ' . $order->code . ' Telah Selesai! <br>
        Dan Telah Diantar Ketempat Anda, <br>
        Selamat menikmati hidangan dari Cafe Upsize.';
        $order->update();
        return response()->json([
            'status' => 'success',
            'message' => 'Orderan Makanan/Minuman yang dilakukan oleh User di diselesaikan',
            'redirect' => route('admin.historyorder.index')
        ]);;
    }
    public function show(Order $order)
    {
        return view('pages.admin.historyorder.show', ['order' => $order]);
    }
}
