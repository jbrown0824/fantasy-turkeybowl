<?php

namespace App\Http\Controllers;

use App\Matchup;
use App\PlayerScore;
use App\Team;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index(Request $request) {
        $week = $request['week'];
        // Find team based on teamId/leagueId, and update team name
        $team = Team::with(['matchups' => function($query) use ($week) {
                $query->where('matchups.week', '=', $week);
            }])
            ->where('fantasy_league_id', '=', $request['leagueId'])
            ->where('fantasy_team_id', '=', $request['teamId'])->firstOrFail();

        $team->name = $request['team'];
        $team->save();

        // Delete players for the week provided
        PlayerScore::where('team_id', '=', $team->id)->where('week', '=', $week)->delete();

        // Add new players listed
        foreach ($request['players'] as $player) {
            $row = new PlayerScore([
                'team_id' => $team->id,
                'week' => $week,
                'name' => $player['name'],
                'score' => (float) $player['score'],
            ]);

            $row->save();
        }

        // Update scores
        foreach ($team->matchups as $matchup) {
            $team->matchups()->updateExistingPivot($matchup['id'], ['team_score' => $request['totalScore']]);
        }

        $team->load('matchups', 'players');

        return $team;
//        return Matchup::with('teams.players')->first();
    }

    public function manualUpdate(Request $request) {
        $newRequest = new Request();
        $newRequest->replace(json_decode($request['data'], true));
        return $this->index($newRequest);
    }
}
