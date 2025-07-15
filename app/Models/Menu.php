<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {
    protected $fillable = ['nama_menu', 'deskripsi', 'harga', 'kategori_id' ,'gambar'];

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function orderItems()
{
    return $this->hasMany(OrderItem::class, 'menu_id');
}


}
