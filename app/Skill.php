<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';
    protected $guarded = [];
    protected $hidden = ['id', 'parent_skill', 'created_at', 'updated_at', 'left_or_right'];

    public function right()
    {
        return $this->belongsTo('App\Skill', 'id', 'parent_skill')->where('left_or_right', 'right');
    }

    public function left()
    {
        return $this->belongsTo('App\Skill', 'id', 'parent_skill')->where('left_or_right', 'left');
    }
}
