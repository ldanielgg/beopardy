<?php
session_start();

$step = isset($_POST['player_count']) ? 2 : 1;

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
            <?php if (!isset($_POST['player_count'])): ?>
                <form method="POST" class="setup-step">
                    <h3 class="input-label">Enter Number of Players</h3>
                    <input type="number" name="player_count" id="playerCount" min="2" max="4" 
                        placeholder="2 - 4 players" class="input-field" required>
                    <button type="submit" class="btn-primary">Next</button>
                </form>
            <?php else: ?>
                <form action="board.php" method="POST" class="setup-step">
                    <div class="name-fields-container">
                        <h3 class="input-label">Enter Player Names</h3>
                        <?php 
                        $count = (int)$_POST['player_count'];
                        for ($i = 1; $i <= $count; $i++): 
                        ?>
                            <div class="input-group">
                                <input type="text" name="player_names[]" 
                                    placeholder="Player <?= $i ?>" 
                                    class="input-field" required>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <button type="submit" class="btn-start">Start Game</button>
                </form>
            <?php endif; ?>
        </div>
    </main>
</body>

</html>