<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'menu')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:diproses,dikirim,sampai',
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.order.index')->with('success', 'Status berhasil diperbarui!');
    }
}
