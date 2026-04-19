<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beopardy</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts/reset.js" defer></script>
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
                <a href="logout.php" class="active-nav">Restart</a>
            </div>
        </nav>
    </header>
    <main>
        <?php
        if (isset($_SESSION['player_names'])) {
            echo "<h2>You have been logged out. Thanks for playing!</h2>";
        } else {
            echo "<h2>You dont have an active session currently.</h2>";
        }
        ?>
        <p>add thing to confirm deletion of sessions data</p>
    </main>
</body>

</html>