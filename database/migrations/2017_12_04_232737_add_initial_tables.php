<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function($table) {
            $table->increments('id');
            $table->string('fantasy_league_id');
            $table->string('fantasy_team_id');
            $table->string('name');
            $table->string('owner');
        });

        Schema::create('player_scores', function($table) {
            $table->increments('id');
            $table->integer('team_id');
            $table->integer('week');
            $table->string('name');
            $table->float('score');
            $table->timestamps();
        });

        Schema::create('matchups', function($table) {
            $table->increments('id');
            $table->integer('week');
        });

        Schema::create('matchup_team', function($table) {
            $table->increments('id');
            $table->integer('matchup_id');
            $table->integer('team_id');
            $table->float('team_score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
        Schema::dropIfExists('player_scores');
        Schema::dropIfExists('matchups');
        Schema::dropIfExists('matchup_team');
    }
}
