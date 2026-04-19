const scoreboardContainer = document.getElementById('scoreboard');
const gameBoard = document.getElementById('game-board');
const cardValues = [100, 200, 300, 400, 500];
const categories = ['science', 'history', 'literature', 'pop culture', 'food'];
const gameData = {
    "science": {
        100: { q: "Commonly known as the 'Red Planet'.", a: "Mars" },
        200: { q: "This constant is approximately 299,792,458 meters per second.", a: "Speed of Light" },
        300: { q: "The organelle often referred to as the powerhouse of the cell.", a: "Mitochondria" },
        400: { q: "The closest star to Earth.", a: "The Sun" },
        500: { q: "Represented by the symbol 'He', it is the lightest of the noble gases.", a: "Helium" }
    },
    "history": {
        100: { q: "He served as the first President of the United States.", a: "George Washington" },
        200: { q: "The French military leader who crowned himself Emperor in 1804.", a: "Napoleon Bonaparte" },
        300: { q: "This 'unsinkable' British passenger liner sank on its maiden voyage in 1912.", a: "Titanic" },
        400: { q: "The year the Berlin Wall finally fell, signaling the end of the Cold War.", a: "1989" },
        500: { q: "The year the Magna Carta was signed by King John at Runnymede.", a: "1215" }
    },
    "literature": {
        100: { q: "The English playwright who wrote 'Romeo and Juliet' and 'Hamlet'.", a: "William Shakespeare" },
        200: { q: "The author who created the world-famous detective Sherlock Holmes.", a: "Arthur Conan Doyle" },
        300: { q: "The author of the dystopian novel '1984'.", a: "George Orwell" },
        400: { q: "The obsessive captain of the Pequod in Herman Melville's 'Moby-Dick'.", a: "Captain Ahab" },
        500: { q: "The Italian poet famous for writing 'The Divine Comedy'.", a: "Dante Alighieri" }
    },
    "pop culture": {
        100: { q: "Often referred to as the 'King of Pop'.", a: "Michael Jackson" },
        200: { q: "The filmmaker responsible for the 1975 blockbuster 'Jaws'.", a: "Steven Spielberg" },
        300: { q: "The comedic actor who provided the voice for the ogre Shrek.", a: "Mike Myers" },
        400: { q: "The Dutch post-impressionist painter of 'The Starry Night'.", a: "Vincent van Gogh" },
        500: { q: "An acronym for someone who has won an Emmy, Grammy, Oscar, and Tony.", a: "EGOT" }
    },
    "food": {
        100: { q: "The primary green fruit used as the base for guacamole.", a: "Avocado" },
        200: { q: "An alcoholic beverage made from fermented grapes.", a: "Wine" },
        300: { q: "The scale used to measure the pungency or spicy heat of chili peppers.", a: "Scoville Scale" },
        400: { q: "The Japanese name for the dried edible seaweed used to wrap sushi.", a: "Nori" },
        500: { q: "A brined curd white cheese traditionally made in Greece from sheep's milk.", a: "Feta" }
    }
};

let currentPlayer = 0;

displayScoreboard();
generateGameBoard();
updateActivePlayerUI();

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

function generateGameBoard() {
    gameBoard.innerHTML = '';
    categories.forEach(category => {
        const header = document.createElement('div');
        header.classList.add('category-header');
        header.textContent = category.toUpperCase();
        gameBoard.appendChild(header);
    });

    cardValues.forEach(value => {
        categories.forEach((cat, index) => {
            const card = document.createElement('div');
            card.classList.add('game-card');
            card.dataset.value = value;
            card.dataset.category = cat;
            card.textContent = `$${value}`;
            card.addEventListener('click', () => handleCardClick(card));
            gameBoard.appendChild(card);
        });
    });
};

function handleCardClick(card) {
    if (card.classList.contains('used')) return;
    openQuestion(card.dataset.category, card.dataset.value);
    console.log(`Clicked ${card.dataset.category} for ${card.dataset.value}`);
    card.classList.add('used');
};

function openQuestion(category, value) {
    const data = gameData[category][value];
    const modal = document.getElementById('question-modal');
    modal.dataset.value = value;
    modal.dataset.category = category;
    document.getElementById('modal-category').textContent = `CATEGORY: ${category.toUpperCase()}`;
    document.getElementById('modal-value').textContent = `FOR $${value}`;
    document.getElementById('modal-question').textContent = data.q;
    document.getElementById('question-modal').style.display = 'flex';
    document.getElementById('reveal-btn').style.display = 'flex';
    document.getElementById('correct-btn').style.display = 'none';
    document.getElementById('incorrect-btn').style.display = 'none';
    updateActivePlayerUI();
};

function checkAnswer() {
    const modal = document.getElementById('question-modal');
    const category = modal.dataset.category;
    const value = modal.dataset.value;
    const answer = gameData[category][value].a;
    document.getElementById('modal-question').innerHTML = `<strong>ANSWER:</strong><br>${answer}`;
    document.getElementById('reveal-btn').style.display = 'none';
    document.getElementById('correct-btn').style.display = 'flex';
    document.getElementById('incorrect-btn').style.display = 'flex';
};

function closeModal() {
    document.getElementById('question-modal').style.display = 'none';
    updateActivePlayerUI();
};

function updateScore(isCorrect) {
    const modal = document.getElementById('question-modal');
    const value = parseInt(modal.dataset.value);
    let currentScore = parseInt(localStorage.getItem(`score_player_${currentPlayer}`) || 0);
    if (isCorrect) {
        currentScore += value;
        localStorage.setItem(`score_player_${currentPlayer}`, currentScore);
    } else {
        currentScore -= value;
        localStorage.setItem(`score_player_${currentPlayer}`, currentScore);
        currentPlayer = (currentPlayer + 1) % players.length;
    }''
    displayScoreboard();
    closeModal();
}

function updateActivePlayerUI() {
    document.querySelectorAll('.player-card').forEach(card => {
        card.classList.remove('active-player');
    });
    const activeCard = document.getElementById(`player-${currentPlayer}`);
    if (activeCard) {
        activeCard.classList.add('active-player');
    };
};

function checkIfGameOver() {
    document.querySelectorAll('.game-card').forEach(card => {
        if (!card.classList.contains('used')) {
            return false;
        };
    });
    return true;
};