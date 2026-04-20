<?php
session_start();

$isCorrect = $_POST['status'] === 'correct';
$pIndex = $_SESSION['current_player'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nextPlayer'])) {
    $_SESSION['current_player'] = ($_SESSION['current_player'] + 1) % count($_SESSION['player_names']);
    $_SESSION['used_questions'][$_SESSION['current_id']] = true;
    unset($_SESSION['current_question']);
    unset($_SESSION['current_id']);
    header("Location: board.php");
    exit();
}

if ($isCorrect) {
    $_SESSION['scores'][$pIndex] += $_SESSION['current_question']['value'];
} else {
    $_SESSION['scores'][$pIndex] -= $_SESSION['current_question']['value'];
    $_SESSION['current_player'] = ($_SESSION['current_player'] + 1) % count($_SESSION['player_names']);
}

$_SESSION['used_questions'][$_SESSION['current_id']] = true;
unset($_SESSION['current_question']);
unset($_SESSION['current_id']);
if (count($_SESSION['used_questions']) >= 25) {
     header("Location: leaderboard.php");
     exit();
}
header("Location: board.php");
exit();
?>