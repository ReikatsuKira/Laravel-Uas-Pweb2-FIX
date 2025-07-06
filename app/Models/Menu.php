<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {
    protected $fillable = ['nama_menu', 'deskripsi', 'harga', 'gambar'];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
