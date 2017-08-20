<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuideVotes extends Model
{
    protected $table = 'guide_votes';
    protected $fillable = ['guide_id', 'user_id'];
}
