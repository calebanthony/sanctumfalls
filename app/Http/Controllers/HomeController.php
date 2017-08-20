<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queries\TooltipQuery;
use App\Queries\GuideVotesQuery;
use App\Hero;

class HomeController extends Controller
{
    public function index()
    {
        $recentGuides = (new GuideVotesQuery())->getTopRecent();
        $popularGuides = (new GuideVotesQuery())->getTopPopular();
        $heroes = Hero::all()->sortBy('name')->pluck('name');

        return view('home', compact('recentGuides', 'popularGuides', 'heroes'));
    }
}
