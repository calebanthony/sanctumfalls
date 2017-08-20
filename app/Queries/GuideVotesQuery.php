<?php

namespace App\Queries;

use App\Guide;

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
        return Guide::orderBy('updated_at', 'desc')
            ->take(3)
            ->get();
    }

    public function getTopPopular()
    {
        return Guide::withCount('votes')
            ->orderBy('votes_count', 'desc')
            ->take(3)
            ->get();
    }
}
