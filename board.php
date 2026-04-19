<?php
session_start();
require 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['player_names'])) {
    $_SESSION['player_names'] = $_POST['player_names'];
    $_SESSION['scores'] = array_fill(0, count($_SESSION['player_names']), 0);
    $_SESSION['current_player'] = 0;
    $_SESSION['used_questions'] = [];
} else if (!isset($_SESSION['player_names'])) {
    header('Location: index.php');
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
                <a href="leaderboard.html">Leaderboard</a>
                <a href="logout.php">Restart</a>
            </div>
        </nav>
    </header>
    <main class="game-container">
        <div class="game-board">
            <?php foreach ($categories as $cat): ?>
                <div class="category-header"><?= strtoupper($cat) ?></div>
            <?php endforeach; ?>
            <?php foreach ($cardValues as $value): ?>
                <?php foreach ($categories as $cat): ?>
                    <?php $id = "$cat-$value"; ?>
                    <?php if (isset($_SESSION['used_questions'][$id])): ?>
                        <div class="game-card used">---</div>
                    <?php else: ?>
                        <form method="POST" action="question.php">
                            <input type="hidden" name="category" value="<?= $cat ?>">
                            <input type="hidden" name="value" value="<?= $value ?>">
                            <input type="hidden" name="card_id" value="<?= $id ?>">
                            <button type="submit" class="game-card">$<?= $value ?></button>
                        </form>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
        <div class="scoreboard" id="scoreboard">
            <?php foreach ($_SESSION['player_names'] as $index => $name): ?>
                <?php 
                    $isActive = ($_SESSION['current_player'] == $index) ? 'active-player' : ''; 
                ?>
                <div class="player-card <?= $isActive ?>">
                    <div class="player-info">
                        <div class="player-number">PLAYER <?= $index + 1 ?></div>
                        <div class="player-name"><?= htmlspecialchars($name) ?></div>
                    </div>
                    <div class="player-score">$<?= number_format($_SESSION['scores'][$index]) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>

</html>