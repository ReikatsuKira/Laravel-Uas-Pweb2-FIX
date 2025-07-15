<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $menu = Menu::findOrFail($request->menu_id);
        $jumlah = (int) $request->input('jumlah', 1);

        if ($jumlah <= 0) {
            return redirect()->back()->with('error', 'Jumlah tidak valid.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$menu->id])) {
            $cart[$menu->id]['quantity'] += $jumlah;
        } else {
            $cart[$menu->id] = [
                'name' => $menu->nama_menu,
                'price' => $menu->harga,
                'quantity' => $jumlah,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Menu ditambahkan ke keranjang!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Item dihapus dari keranjang!');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang kosong!');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'tanggal' => now(),
            'total' => $total,
            'status' => 'diproses',
        ]);

        foreach ($cart as $menu_id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $menu_id,
                'jumlah' => $item['quantity'],
            ]);
        }

        session()->forget('cart');
        return redirect()->route('order.index')->with('success', 'Pesanan berhasil dibuat!');
    }
}
