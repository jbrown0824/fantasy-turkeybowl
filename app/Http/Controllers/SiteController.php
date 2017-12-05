<?php

namespace App\Http\Controllers;

use App\Matchup;
use App\Team;

class SiteController extends Controller
{
    public function index() {
        $matchups = Matchup::with('teams')->get()->toArray();
        return view('index', ['matchups' => $matchups]);
    }

    public function matchup($id) {
        $matchup = Matchup::find($id);
        $matchup = Matchup::with(['teams.players' => function($query) use ($matchup) {
            $query->where('player_scores.week', '=', $matchup['week']);
        }])->find($id);

//        return $matchup;
        return view('matchup', ['matchup' => $matchup]);
    }
}
