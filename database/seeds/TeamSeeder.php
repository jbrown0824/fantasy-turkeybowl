<?php

use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teamA = DB::table('teams')->insertGetId([
            'fantasy_league_id' => 557635,
            'fantasy_team_id' => 11,
            'name' => 'Hot Garbage',
            'owner' => 'Danny'
        ]);

        $teamB = DB::table('teams')->insertGetId([
            'fantasy_league_id' => 557635,
            'fantasy_team_id' => 9,
            'name' => 'The Sun Did It',
            'owner' => 'Lewis'
        ]);

        $matchupId = DB::table('matchups')->insert([
            'week' => 14
        ]);

        DB::table('matchup_team')->insert([
            'matchup_id' => $matchupId,
            'team_id' => $teamA,
            'team_score' => 0
        ]);

        DB::table('matchup_team')->insert([
            'matchup_id' => $matchupId,
            'team_id' => $teamB,
            'team_score' => 0
        ]);

        DB::table('player_scores')->insert([
            'team_id' => $teamA,
            'week' => 14,
            'name' => 'Joe Flacco',
            'score' => 3.72
        ]);
    }
}
