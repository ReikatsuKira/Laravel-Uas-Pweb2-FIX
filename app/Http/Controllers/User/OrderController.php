<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Menu;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['orderItems.menu'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.order.index', compact('orders'));
    }

    public function store(Request $request)
{
    $request->validate([
        'menu_id' => 'required|exists:menus,id',
        'jumlah' => 'required|integer|min:1',
    ]);

    $menu = Menu::findOrFail($request->menu_id);


    $order = Order::create([
        'user_id' => Auth::id(),
        'tanggal' => Carbon::now(),
        'total' => $menu->harga * $request->jumlah,
        'status' => 'diproses',
    ]);

    OrderItem::create([
        'order_id' => $order->id,
        'menu_id' => $menu->id,
        'jumlah' => $request->jumlah,
    ]);

    return redirect()->route('order.index')->with('success', 'Pesanan berhasil dibuat!');
}
}
