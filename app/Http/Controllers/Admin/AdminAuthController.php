<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function index()
    {
        if (session()->has('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('username', $validated['username'])->first();

        if (!$admin || !Hash::check($validated['password'], $admin->password)) {
            return back()
                ->withErrors(['login' => 'Username atau password admin salah.'])
                ->withInput();
        }

        session()->forget(['client_id', 'client_name']);

        session([
            'admin_logged_in' => true,
            'admin_id' => $admin->id,
            'admin_name' => $admin->name,
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        session()->forget([
            'admin_logged_in',
            'admin_id',
            'admin_name',
        ]);

        return redirect()->route('home');
    }
}