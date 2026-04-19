<?php
session_start();

if (isset($_SESSION['player_names'])) {
    header('Location: board.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beopardy</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts/index.js" defer></script>
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
                <a href="leaderboard.php">Leaderboard</a>
            </div>
        </nav>
    </header>
    <main class="login-container">
        <div class="setup-box">
            <img src="assets/title.png" alt="Beopardy Logo" class="main-image">
            <div id="setup-step-1">
                <h3 class="input-label">Enter Number of Players</h3>
                <input type="number" id="playerCount" min="2" max="4" placeholder="2 - 4 players"
                    class="input-field" required>
                <button type="button" class="btn-primary" onclick="generateNameFields()">Next</button>
            </div>
            <form action="board.php" method="POST" id="setup-step-2">
                <div id="name-fields-container">
                </div>
                <button type="submit" class="btn-start">Start Game</button>
            </form>
        </div>
    </main>
</body>

</html>