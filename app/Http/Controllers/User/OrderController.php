<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('menu')->where('user_id', auth()->id())->get();
        return view('user.order.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        Order::create([
            'menu_id' => $validated['menu_id'],
            'user_id' => auth()->id(),
            'jumlah' => $validated['jumlah'],
            'status' => 'diproses',
        ]);

        return redirect()->route('order.index')->with('success', 'Pesanan berhasil dibuat!');
    }
}
