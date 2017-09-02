<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $table = 'heroes';
    protected $guarded = [];
    protected $hidden = ['id'];

    public function lmbAbility()
    {
        return $this->belongsTo('App\Skill', 'lmb_ability', 'id')
                    ->with('right.right', 'right.left', 'left.right', 'left.left');
    }

    public function rmbAbility()
    {
        return $this->belongsTo('App\Skill', 'rmb_ability', 'id')
                    ->with('right.right', 'right.left', 'left.right', 'left.left');
    }

    public function fAbility()
    {
        return $this->belongsTo('App\Skill', 'f_ability', 'id')
                    ->with('right.right', 'right.left', 'left.right', 'left.left');
    }

    public function qAbility()
    {
        return $this->belongsTo('App\Skill', 'q_ability', 'id')
                    ->with('right.right', 'right.left', 'left.right', 'left.left');
    }

    public function eAbility()
    {
        return $this->belongsTo('App\Skill', 'e_ability', 'id')
                    ->with('right.right', 'right.left', 'left.right', 'left.left');
    }

    public function getTalent1()
    {
        return $this->belongsTo('App\Skill', 'talent1', 'id');
    }

    public function getTalent2()
    {
        return $this->belongsTo('App\Skill', 'talent2', 'id');
    }

    public function getTalent3()
    {
        return $this->belongsTo('App\Skill', 'talent3', 'id');
    }

    public function tier()
    {
        return $this->hasMany('App\TierList');
    }

    /**
     * Determine if the given user voted for this hero
     * @param  User   $user The user in question.
     * @param  Integer   $tier The tier the user voted for.
     * @return boolean
     */
    public function votedForBy(User $user, $tier)
    {
        $votes = $this->tier()->get();
        return $votes->where('voter_id', $user->id)->where('tier', $tier)->isNotEmpty();
    }

    public function profile($thumb = 'null')
    {
        if ($thumb === 'thumb') {
            return "/images/" . preg_replace('/\s+/', '', strtolower($this->name)) . "/profile_thumb.png";
        } else {
            return "/images/" . preg_replace('/\s+/', '', strtolower($this->name)) . "/profile.png";
        }
    }
}
