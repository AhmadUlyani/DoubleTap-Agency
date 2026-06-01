<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        if (session()->has('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }

        if (session()->has('client_id')) {
            return redirect()->route('dashboard');
        }

        return view('login.index');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('username', $validated['username'])->first();

        if ($admin && Hash::check($validated['password'], $admin->password)) {
            session()->forget(['client_id', 'client_name']);

            session([
                'admin_logged_in' => true,
                'admin_id' => $admin->id,
                'admin_name' => $admin->name,
            ]);

            return redirect()->route('admin.dashboard');
        }

        $client = Client::where('username', $validated['username'])->first();

        if (!$client || !Hash::check($validated['password'], $client->password)) {
            return back()
                ->withErrors(['login' => 'Username atau password salah.'])
                ->withInput();
        }

        session()->forget(['admin_logged_in', 'admin_id', 'admin_name']);

        session([
            'client_id' => $client->id,
            'client_name' => $client->business_name,
        ]);

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        session()->forget([
            'client_id',
            'client_name',
            'admin_logged_in',
            'admin_name',
        ]);

        return redirect()->route('home');
    }
}
