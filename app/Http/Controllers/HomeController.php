<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\ServicePackage;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $services = ServicePackage::with(['features' => fn ($q) => $q->where('is_included', true)->orderBy('sort_order')])
            ->orderBy('sort_order')
            ->get()
            ->map(fn ($p) => [
                'icon' => $p->icon,
                'title' => $p->name,
                'price' => 'Rp ' . number_format($p->price, 0, ',', '.'),
                'period' => $p->period,
                'features' => DB::table('home_package_features')->where('service_package_id', $p->id)->orderBy('sort_order')->pluck('feature')->toArray(),
                'cta' => $p->is_highlight ? 'Pilih Growth' : 'Pilih Starter',
                'highlight' => (bool) $p->is_highlight,
            ])->toArray();

        $portfolio = Portfolio::orderBy('sort_order')->get()->map(fn ($i) => [
            'icon' => $i->icon,
            'theme' => $i->theme,
            'type' => $i->type,
            'title' => $i->title,
            'desc' => $i->description,
            'likes' => $i->likes,
            'reach' => $i->reach,
            'tags' => $i->tags ?? [],
        ])->toArray();

        $testimonials = Testimonial::orderBy('sort_order')->get()->map(fn ($t) => [
            'name' => $t->name,
            'biz' => $t->business,
            'text' => $t->message,
            'package' => $t->package_name,
        ])->toArray();

        return view('home.index', [
            'pageTitle' => 'DoubleTap Agency — Social Media Management untuk UMKM',
            'heroTagline' => 'Biarkan Kontenmu Bekerja Keras',
            'heroSub' => 'Kami mengelola Instagram & TikTok bisnis kuliner dan fashion kamu dengan pendekatan data-driven — bukan sekadar gambar bagus.',
            'services' => $services,
            'portfolio' => $portfolio,
            'testimonials' => $testimonials,
        ]);
    }
}
