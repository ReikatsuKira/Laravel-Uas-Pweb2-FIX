<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class VerifyIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $role_id = $request->user()->role_id;
        $adminId = Role::where('role_nama', 'admin')->first()?->id;

        if ($role_id !== $adminId) {
            Alert::error('Gagal', 'Anda Tidak Memiliki Hak Akses');
            return redirect()->route('home');
        }

        return $next($request);
    }
}
