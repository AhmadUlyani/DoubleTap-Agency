<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientContent;
use App\Models\ClientHashtag;
use App\Models\ClientInsight;
use App\Models\ClientReachTrend;
use App\Models\ClientRecommendation;
use App\Models\ClientStat;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session()->has('client_id')) {
            return redirect()->route('login');
        }

        $client = Client::with('package')->findOrFail(session('client_id'));
        $isGrowth = optional($client->package)->is_highlight;

        $stats = ClientStat::where('client_id', $client->id)->orderBy('sort_order')->get()->map(fn ($s) => [
            'icon' => $s->icon,
            'value' => $s->value,
            'label' => $s->label,
            'trend' => $s->trend,
            'trendType' => $s->trend_type,
        ])->toArray();

        $reachTrend = ClientReachTrend::where('client_id', $client->id)->orderBy('sort_order')->get()->map(fn ($r) => [
            'month' => $r->month,
            'value' => $r->value,
        ])->toArray();

        $contents = ClientContent::where('client_id', $client->id)->orderBy('sort_order')->get()->map(fn ($c) => [
            'date' => $c->display_date,
            'title' => $c->title,
            'type' => $c->type,
            'reach' => $c->reach,
            'likes' => $c->likes,
            'comments' => $c->comments,
        ])->toArray();

        $growthInsights = ClientInsight::where('client_id', $client->id)->orderBy('sort_order')->get()->map(fn ($i) => [
            'icon' => $i->icon,
            'title' => $i->title,
            'desc' => $i->description,
        ])->toArray();

        $recommendations = ClientRecommendation::where('client_id', $client->id)->orderBy('sort_order')->pluck('recommendation')->toArray();
        $hashtags = ClientHashtag::where('client_id', $client->id)->orderBy('sort_order')->pluck('hashtag')->toArray();

        return view('dashboard.index', [
            'pageTitle' => 'Dashboard Klien — DoubleTap Agency',
            'clientName' => $client->business_name,
            'clientUsername' => $client->username,
            'clientBusinessType' => $client->business_type,
            'clientPackage' => $isGrowth ? 'growth' : 'starter',
            'isGrowth' => $isGrowth,
            'period' => 'Juni 2025',
            'stats' => $stats,
            'reachTrend' => $reachTrend,
            'contents' => $contents,
            'growthInsights' => $growthInsights,
            'recommendations' => $recommendations,
            'hashtags' => $hashtags,
        ]);
    }
}
