<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\ProcessStep;
use App\Models\ServicePackage;
use App\Models\Tool;

class ServiceController extends Controller
{
    public function index()
    {
        $packages = ServicePackage::with(['features' => fn ($q) => $q->orderBy('sort_order')])
            ->orderBy('sort_order')
            ->get()
            ->map(fn ($p) => [
                'icon' => $p->icon,
                'title' => $p->name,
                'price' => 'Rp ' . number_format($p->price, 0, ',', '.'),
                'period' => $p->period,
                'highlight' => (bool) $p->is_highlight,
                'desc' => $p->description,
                'features' => $p->features->where('is_included', true)->pluck('feature')->values()->toArray(),
                'not_include' => $p->features->where('is_included', false)->pluck('feature')->values()->toArray(),
            ])->toArray();

        $process = ProcessStep::orderBy('sort_order')->get()->map(fn ($p) => [
            'step' => $p->step_number,
            'title' => $p->title,
            'desc' => $p->description,
            'icon' => $p->icon,
        ])->toArray();

        $tools = Tool::orderBy('sort_order')->get()->map(fn ($t) => [
            'name' => $t->name,
            'category' => $t->category,
            'icon' => $t->icon,
        ])->toArray();

        $faqs = Faq::orderBy('sort_order')->get()->map(fn ($f) => [
            'q' => $f->question,
            'a' => $f->answer,
        ])->toArray();

        return view('service.index', [
            'pageTitle' => 'Layanan Kami — DoubleTap Agency',
            'packages' => $packages,
            'process' => $process,
            'tools' => $tools,
            'faqs' => $faqs,
        ]);
    }
}
