<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fantasy_league_id', 'fantasy_team_id', 'name', 'owner'
    ];

    public function players() {
        return $this->hasMany(PlayerScore::class);
    }

    public function matchups() {
        return $this->belongsToMany(Matchup::class)->withPivot('team_score');
    }
}
