<?php

namespace App\Queries;

use App\Hero;

class HeroTierQuery
{
    public static function getTier1()
    {
        $heroes = Hero::with('tier')->get();

        $tier1 = [];
        foreach ($heroes as $hero) {
            if ($hero->tier()->avg('tier') < 1.6) {
                array_push($tier1, $hero);
            }
        }

        return $tier1;
    }

    public static function getTier2()
    {
        $heroes = Hero::with('tier')->get();

        $tier2 = [];
        foreach ($heroes as $hero) {
            if ($hero->tier()->avg('tier') >= 1.6 && $hero->tier()->avg('tier') <= 2.4) {
                array_push($tier2, $hero);
            }
        }

        return $tier2;
    }

    public static function getTier3()
    {
        $heroes = Hero::with('tier')->get();

        $tier3 = [];
        foreach ($heroes as $hero) {
            if ($hero->tier()->avg('tier') > 2.4) {
                array_push($tier3, $hero);
            }
        }

        return $tier3;
    }
}
