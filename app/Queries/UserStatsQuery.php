<?php

namespace App\Queries;

use App\User;
use App\Guide;
use App\GuideVotes;

class UserStatsQuery
{
    public function get($username)
    {
        $stats = (object)[];
        $stats->views = $this->getTotalViews($username);
        $stats->thumbUps = $this->getTotalThumbUps($username);
        $stats->thumbUpsGiven = $this->getTotalThumbUpsGiven($username);

        return $stats;
    }

    private function getTotalViews($username)
    {
        $totalViews = 0;
        $allGuides = Guide::withCount('votes')
            ->where('author', $username)
            ->get();

        foreach ($allGuides as $guide) {
            $totalViews += $guide->views;
        }

        return $totalViews;
    }

    private function getTotalThumbUps($username)
    {
        $totalThumbUps = 0;
        $allGuides = Guide::withCount('votes')
            ->where('author', $username)
            ->get();

        foreach ($allGuides as $guide) {
            $totalThumbUps += $guide->votes_count;
        }

        return $totalThumbUps;
    }

    private function getTotalThumbUpsGiven($username)
    {
        $userId = User::where('name', $username)->first()->id;
        $allThumbUpsGiven = GuideVotes::where('user_id', $userId)
            ->count();

        return $allThumbUpsGiven;
    }
}
