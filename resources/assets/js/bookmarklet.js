javascript:(function() {
    var baseApiUrl = 'https://turkeybowl.dev/'; // YOU MUST UPDATE THIS. IT MUST END IN A SLASH
    var team = document.querySelector('.Navtarget.Py-sm.Pstart-lg.F-reset.Wordwrap-bw.No-case');
    var teamName = team.firstChild.nodeValue.trim();
    var week = document.querySelector('#team-roster header .Flyoutselect .flyout_trigger span').textContent;
    var url = team.href;
    var urlParts = url.substring(0, url.length - 5).split('/');
    var players = document.querySelectorAll('#fantasy .tablewrap table tbody tr:not(.bench');

    var computed = {
        team: teamName,
        week: week.replace(/([^0-9])/g, ''),
        teamId: urlParts.pop(),
        leagueId: urlParts.pop(),
        totalScore: 0,
        players: []
    };

    for (var i = 0; i < players.length; i++) {
        var player = players[i];
        var columns = player.querySelectorAll('td');
        var name = columns[1].querySelector('a.name').textContent;
        var score = player.querySelector('.Ta-end.Nowrap.Bdrstart').textContent;
        if (isNaN(score)) {
            score = 0;
        }

        score = parseFloat(score);

        computed.totalScore += score;
        computed.players.push({
            name: name,
            score: score
        });
    }

    console.log(JSON.stringify(computed));

    var request = new XMLHttpRequest();
    request.open('GET', baseApiUrl + 'api/update-score', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.send(computed);
})();
