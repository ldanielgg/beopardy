<?php
require 'config/config.php';

if (!isset($_SESSION['player_names']) || !isset($_SESSION['scores'])) {
    header('Location: index.php');
    exit();
}

$leaderboard = [];
foreach ($_SESSION['player_names'] as $index => $name) {
    $leaderboard[] = [
        'name' => $name,
        'score' => $_SESSION['scores'][$index]
    ];
}

usort($leaderboard, function($a, $b) {
    return $a['score'] <=> $b['score'];
});

$winner = $leaderboard[0];
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
                <a href="board.php">Lobby</a>
                <a href="leaderboard.php" class="active-nav">Leaderboard</a>
            </div>
        </nav>
    </header>
    
    <main class="game-layout-wrapper">
        <div class="leaderboard-container">
            <p class="leaderboard-header"><?php if (count($_SESSION['used_questions']) >= 25) { echo "FINAL STANDINGS"; } else { echo "CURRENT STANDINGS"; } ?></p>
            <div class="leaderboard-content">
                <div class="winner-section">
                    <?php if (count($_SESSION['used_questions']) >= 25): ?>
                        <h2><?= htmlspecialchars($winner['name']) ?> Wins!</h2>
                        <p>Final Score: $<?= number_format($winner['score']) ?></p>
                    <?php else: ?>
                        <h2><?= htmlspecialchars($winner['name']) ?> is currently in the lead!</h2>
                    <?php endif; ?>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>RANK</th>
                            <th>PLAYER</th>
                            <th style="text-align: right;">SCORE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($leaderboard as $rank => $player): ?>
                            <tr>
                                <td>#<?= $rank + 1 ?></td>
                                <td><?= htmlspecialchars($player['name']) ?></td>
                                <td style="text-align: right;">
                                    $<?= number_format($player['score']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="question-actions">
                <form action="logout.php" method="POST">
                    <button type="submit" class="btn-primary">New Game</button>
                </form>
                <a href="board.php" class="question-subtext" style="text-decoration: none;">Return to Board</a>
            </div>
        </div>
    </main>
</body>

</html>