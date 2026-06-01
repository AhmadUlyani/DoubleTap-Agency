<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ServicePackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminClientController extends Controller
{
    private function checkAdmin()
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return null;
    }

    public function index()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $clients = Client::with('package')
            ->latest()
            ->paginate(10);

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $packages = ServicePackage::orderBy('sort_order')->get();

        return view('admin.clients.create', compact('packages'));
    }

    public function store(Request $request)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $validated = $request->validate([
            'business_name' => 'required|string|max:150',
            'username' => 'required|string|max:100|unique:clients,username',
            'password' => 'required|string|min:6',
            'business_type' => 'required|string|max:150',
            'service_package_id' => 'nullable|exists:service_packages,id',
        ], [
            'business_name.required' => 'Nama bisnis wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'business_type.required' => 'Jenis bisnis wajib diisi.',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        Client::create($validated);

        return redirect()
            ->route('admin.clients.index')
            ->with('success', 'Data klien berhasil ditambahkan.');
    }

    public function edit(Client $client)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $packages = ServicePackage::orderBy('sort_order')->get();

        return view('admin.clients.edit', compact('client', 'packages'));
    }

    public function update(Request $request, Client $client)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $validated = $request->validate([
            'business_name' => 'required|string|max:150',
            'username' => 'required|string|max:100|unique:clients,username,' . $client->id,
            'password' => 'nullable|string|min:6',
            'business_type' => 'required|string|max:150',
            'service_package_id' => 'nullable|exists:service_packages,id',
        ], [
            'business_name.required' => 'Nama bisnis wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'password.min' => 'Password minimal 6 karakter.',
            'business_type.required' => 'Jenis bisnis wajib diisi.',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $client->update($validated);

        return redirect()
            ->route('admin.clients.index')
            ->with('success', 'Data klien berhasil diperbarui.');
    }

    public function destroy(Client $client)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $client->delete();

        return redirect()
            ->route('admin.clients.index')
            ->with('success', 'Data klien berhasil dihapus.');
    }
}