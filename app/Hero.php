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
}
