const scoreboardContainer = document.getElementById('scoreboard');

displayScoreboard();

function displayScoreboard() {
    scoreboardContainer.innerHTML = '';
    players.forEach((player, index) => {
        const playerScore = localStorage.getItem(`score_player_${index}`) || 0;
        const playerEntry = document.createElement('div');
        playerEntry.classList.add('player-card');
        playerEntry.setAttribute('id', `player-${index}`);
        playerEntry.innerHTML = `
            <div class="player-info">
                <div class="player-number">PLAYER ${index + 1}</div>
                <div class="player-name">${player}</div>
            </div>
            <div class="player-score" id="score-val-${index}">$${playerScore}</div>
        `;
        scoreboardContainer.appendChild(playerEntry);
    });
};