<?php

namespace App\Http\Controllers;

use App\Models\CompanyValue;
use App\Models\TeamMember;

class AboutController extends Controller
{
    public function index()
    {
        $team = TeamMember::orderBy('sort_order')->get()->map(fn ($m) => [
            'icon' => $m->icon,
            'role' => $m->role,
            'focus' => $m->focus,
            'desc' => $m->description,
            'skills' => $m->skills ?? [],
        ])->toArray();

        $values = CompanyValue::orderBy('sort_order')->get()->map(fn ($v) => [
            'icon' => $v->icon,
            'title' => $v->title,
            'desc' => $v->description,
        ])->toArray();

        return view('about.index', [
            'pageTitle' => 'Tentang Kami — DoubleTap Agency',
            'team' => $team,
            'values' => $values,
        ]);
    }
}
