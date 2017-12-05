<h1>Matchups</h1>
@foreach ($matchups as $matchup)
    <a href="/matchup/{{$matchup['id']}}">
        Week {{$matchup['week']}}:
        <b>{{$matchup['teams'][0]['name']}}</b> ({{$matchup['teams'][0]['pivot']['team_score']}}) vs.
        <b>{{$matchup['teams'][1]['name']}}</b> ({{$matchup['teams'][1]['pivot']['team_score']}})
        <br><br>
    </a>
@endforeach
