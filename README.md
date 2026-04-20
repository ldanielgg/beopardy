# Beopardy

A web-based Jeopardy-style trivia game built with PHP, JavaScript, and CSS. This project allows users to play through categories of questions with a functional scoreboard and real-time session management.

## Features

* **Dynamic Game Board:** Interactive grid layout featuring multiple categories and point values.
* **Real-time Scoring:** Automatic score tracking for players as they answer questions correctly or incorrectly.
* **Session Persistence:** Utilizes PHP sessions to maintain game state, ensuring progress isn't lost on page refreshes.
* **Customizable Content:** Easily modify the underlying data structures to create unique question sets.

## Screenshots

| ![Game Board](/assets/readme/board.png) | ![Question](/assets/readme/question.png) | ![Leaderboard](/assets/readme/leaderboard.png) |
|:---:|:---:|:---:|
| **Game Board** | **Question Screen** | **Leaderboard** |
| The main game board featuring categories and point values. | The question screen showing the current clue. | Current scores of players in order. |

## Tech Stack

* **Frontend:** HTML5, CSS3
* **Backend:** PHP
* **State Management:** PHP Sessions

## Setup Instructions

### Prerequisites

* A web server with PHP support (e.g., Apache via XAMPP, WAMP, or MAMP).
* A modern web browser.

### Installation

1.  **Clone the Repository:**
    ```bash
    git clone https://github.com/ldanielgg/beopardy.git
    ```
2.  **Move to Web Root:**
    Move the project folder to your local server's document root (e.g., `C:/xampp/htdocs/` or `/var/www/html/`).
3.  **Launch the Game:**
    * Start your local Apache server.
    * Open your browser and navigate to `http://localhost/beopardy/index.php`.