<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index', [
            'pageTitle' => 'Konsultasi Gratis — DoubleTap Agency',
            'success' => session('success', false),
            'errors' => session('form_errors', []),
            'post' => old(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:30',
            'business' => 'required|string|max:150',
            'sector' => 'required|string|max:50',
            'package' => 'required|string|max:50',
            'ig' => 'nullable|string|max:100',
            'message' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'phone.required' => 'Nomor WhatsApp wajib diisi.',
            'business.required' => 'Nama bisnis wajib diisi.',
            'sector.required' => 'Pilih sektor bisnis.',
            'package.required' => 'Pilih paket layanan.',
        ]);

        ContactMessage::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'business_name' => $validated['business'],
            'sector' => $validated['sector'],
            'package' => $validated['package'],
            'instagram' => $validated['ig'] ?? null,
            'message' => $validated['message'] ?? null,
        ]);

        return redirect()->route('contact')->with('success', true);
    }
}
