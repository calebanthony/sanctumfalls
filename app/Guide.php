<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Guide extends Model
{
    protected $table = 'guides';
    protected $guarded = [];

    /**
     * A guide is owned by a single author.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Determine if the given user created this guide.
     * @param  User   $user The user in question.
     * @return boolean
     */
    public function ownedBy(User $user)
    {
        return $this->author_id == $user->id;
    }

    /**
     * Takes the string of pros and unserializes it back into an array
     * @param  string $pros This is from the database.
     * @return array       An array of pros.
     */
    public function getProsAttribute($pros)
    {
        return unserialize($pros);
    }

    /**
     * Takes the string of cons and unserializes it back into an array
     * @param  string $cons This is from the database.
     * @return array       An array of cons.
     */
    public function getConsAttribute($cons)
    {
        return unserialize($cons);
    }

    public function getViewsAttribute($views)
    {
        if ($views>1000000000000) {
            return round(($views/1000000000000), 1) . 't';
        } elseif ($views>1000000000) {
            return round(($views/1000000000), 1) . 'b';
        } elseif ($views>1000000) {
            return round(($views/1000000), 1) . 'm';
        } elseif ($views>1000) {
            return round(($views/1000), 1) . 'k';
        }

        return number_format($views);
    }

    /**
     * A guide may have many votes from different users
     */
    public function votes()
    {
        return $this->hasMany('App\GuideVotes');
    }

    /**
     * Return the information about the hero specified in the guide.
     */
    public function getHero()
    {
        return Hero::where('name', $this->hero)
            ->with('lmbAbility', 'rmbAbility', 'fAbility', 'qAbility', 'eAbility', 'getTalent1', 'getTalent2', 'getTalent3')
            ->first();
    }

    public function getIsFreshAttribute()
    {
        return $this->created_at >= Carbon::now()->subDays(28);
    }

    public function getIsStaleAttribute()
    {
        return $this->created_at <= Carbon::now()->subDays(70);
    }
}
