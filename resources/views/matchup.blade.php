<table width="100%">
    <tr>
        <th>{{$matchup['teams'][0]['name']}}</th>
        <th>Week {{$matchup['week']}}</th>
        <th>{{$matchup['teams'][1]['name']}}</th>
    </tr>
    <tr>
        <th>{{$matchup['teams'][0]['pivot']['team_score']}}</th>
        <th></th>
        <th>{{$matchup['teams'][1]['pivot']['team_score']}}</th>
    </tr>
</table>

<h2>Players</h2>
<table width="100%">
    <tr>
        <td width="50%">
            {{$matchup['teams'][0]['name']}}
            <table width="100%">
                <tr>
                    <th>Name</th>
                    <th>Score</th>
                </tr>
                @foreach ($matchup['teams'][0]['players'] as $player)
                    <tr>
                        <td width="90%">{{$player['name']}}</td>
                        <td>{{$player['score']}}</td>
                    </tr>
                @endforeach
            </table>
        </td>
        <td width="50%">
            {{$matchup['teams'][1]['name']}}
            <table width="100%">
                <tr>
                    <th>Name</th>
                    <th>Score</th>
                </tr>
                @foreach ($matchup['teams'][1]['players'] as $player)
                    <tr>
                        <td width="90%">{{$player['name']}}</td>
                        <td>{{$player['score']}}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
