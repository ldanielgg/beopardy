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
    <script src="script.js" defer></script>
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
                <a href="logout.php">Logout</a>
            </div>
        </nav>
    </header>
    <main class="game-container">
        <h1>Welcome to Beopardy!</h1>
        <p>Player Names: <?php echo implode(", ", $_SESSION['player_names']); ?></p>
        <p>Player Scores: <?php echo implode(", ", $_SESSION['scores']); ?></p>
    </main>
</body>

</html>