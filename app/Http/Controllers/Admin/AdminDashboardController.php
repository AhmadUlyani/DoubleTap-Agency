<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ContactMessage;
use App\Models\ServicePackage;

class AdminDashboardController extends Controller
{
    public function index()
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $totalClients = Client::count();
        $totalPackages = ServicePackage::count();
        $totalMessages = ContactMessage::count();

        $latestClients = Client::with('package')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalClients',
            'totalPackages',
            'totalMessages',
            'latestClients'
        ));
    }
}