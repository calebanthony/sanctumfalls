<?php

namespace App\Queries;

use App\Hero;
use App\Skill;

class TooltipQuery
{
    /**
     * Gets all the data necessary to render a tooltip.
     * @param  string $skill The ID of a tooltip, like "rmb_left_left"
     * @param  string $hero The hero the tooltip belongs to
     * @return Tooltip object
     */
    public static function get($hero, $skill)
    {
        // Break out each step of the skill ID so it's an array.
        $steps = explode('_', $skill);

        // Grab the Hero, which we will use to get the skill details
        $selectedHero = Hero::where('name', $hero)->first();

        // Check if skill is primary, secondary, or tertiary
        if (!array_key_exists(1, $steps)) {
            // This means there's only the first step, which
            // will be something like "Outgunned" or "lmb"
            if ($steps[0] !== 'lmb' && $steps[0] !== 'rmb' && $steps[0] !== 'f' && $steps[0] !== 'q' && $steps[0] !== 'e') {
                $selectedSkill = Skill::where('name', $steps[0])->first();
            } else {
                $selectedSkill = $selectedHero->{$steps[0] . 'Ability'};
            }
        } elseif (!array_key_exists(2, $steps)) {
            // This means it's a secondary skill, like "f_left"
            $selectedSkill = $selectedHero->{$steps[0] . 'Ability'}->{$steps[1]};
        } else {
            // Here, it has to be a tertiary skill, like "q_right_left"
            $selectedSkill = $selectedHero->{$steps[0] . 'Ability'}->{$steps[1]}->{$steps[2]};
        }

        // Set each part of the finished skill
        $imageUri = "/images/" . preg_replace('/\s+/', '', strtolower($hero)) . "/" . strtolower($steps[0]) . ".png";
        $name = $selectedSkill->name;
        $description = $selectedSkill->description;

        // Finished object!
        $finishedSkill = collect([
            'skillKey'      => strtoupper($steps[0]),
            'imageUri'      => $imageUri,
            'name'          => $name,
            'description'   => $description,
        ]);

        return $finishedSkill;
    }

    /**
     * Gets the base skill tooltips for a hero
     * @param  string $hero The name of the hero
     * @return A collection of all the skills
     */
    public static function getBaseSkills($hero)
    {
        return collect([
            'lmb'   => self::get($hero, 'lmb'),
            'rmb'   => self::get($hero, 'rmb'),
            'f'     => self::get($hero, 'f'),
            'q'     => self::get($hero, 'q'),
            'e'     => self::get($hero, 'e'),
        ]);
    }
}
