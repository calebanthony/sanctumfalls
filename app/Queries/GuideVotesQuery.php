<?php

namespace App\Queries;

use App\Guide;
use Carbon\Carbon;

class GuideVotesQuery
{
    public function get($sortByPopular, $hero)
    {
        $order = $sortByPopular ? 'votes_count' : 'updated_at';

        return Guide::withCount('votes')
            ->where('hero', $hero)
            ->orderBy($order, 'desc')
            ->paginate(10);
    }

    public function getTopRecent()
    {
        return Guide::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    }

    public function getTopPopular()
    {
        return Guide::withCount('votes')
            ->where('updated_at', '>=', Carbon::now()->subDays(30))
            ->orderBy('votes_count', 'desc')
            ->take(5)
            ->get();
    }
}
