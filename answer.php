<?php
session_start();
if (!isset($_SESSION['current_question']) || !isset($_SESSION['current_id'])) {
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
                <a href="index.php">Lobby</a>
                <a href="leaderboard.html">Leaderboard</a>
                <a href="logout.php">Restart</a>
            </div>
        </nav>
    </header>
    <div class="game-layout-wrapper">
        <aside class="scoreboard-sidebar">
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
        </aside>
        <main class="question-container">
            <p id="question-category" class="question-category">CATEGORY: <?php echo strtoupper($_SESSION['current_question']['category']); ?></p>
            <p id="question-value" class="question-value">FOR $<?php echo $_SESSION['current_question']['value']; ?></p>
            <div id="question" class="question">
                <div class="question-content">
                    <p id="question-question" class="question-question"><?php echo $_SESSION['current_question']['answer']; ?></p>
                </div>
            </div>
            <form method="POST" action="process.php" class="answer-actions">
                <button type="submit" name="status" value="correct" class="btn-primary">
                    Correct
                </button>
                <button type="submit" name="status" value="incorrect" class="btn-primary">
                    Incorrect
                </button>
            </form>
        </main>
    </div>
</body>

</html>