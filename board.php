<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['player_names'])) {
        $_SESSION['player_names'] = $_POST['player_names'];
        $_SESSION['player_count'] = count($_POST['player_names']);
        $_SESSION['scores'] = array_fill(0, $_SESSION['player_count'], 0);
        $_SESSION['current_player'] = 0;
    }

    if (!isset($_SESSION['player_names'])) {
        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beopardy</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts/board.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Space+Grotesk:wght@300..700&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <nav class="nav-bar">
            <img src="assets/title.png" alt="Beopardy Logo" class="logo">
            <div class="links">
                <a href="index.php" class="active-nav">Lobby</a>
                <a href="leaderboard.html">Leaderboard</a>
                <a href="logout.php">Restart</a>
            </div>
        </nav>
    </header>
    <main class="game-container">
        <div class="game-board" id="game-board">
        </div>
        <div class="scoreboard" id="scoreboard">
        </div> 
    </main>
    <div id="question-modal" class="modal-overlay">
        <div class="modal-content">
            <p id="modal-category" class="modal-category"></p>
            <p id="modal-value" class="modal-value"></p>
            <p id="modal-question" class="modal-question"></p>
            <div class="modal-actions">
                <button onclick="updateScore(true)" id="correct-btn" class="btn-primary">Correct</button>
                <button onclick="updateScore(false)" id="incorrect-btn" class="btn-primary">Incorrect</button>
                <button onclick="checkAnswer()" id="reveal-btn" class="btn-primary">Show Answer</button>
            </div>
        </div>
    </div>
    <script>
        const players = <?php echo json_encode($_SESSION['player_names']); ?>;
    </script>
</body>

</html>