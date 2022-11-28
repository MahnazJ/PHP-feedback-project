<?php

session_start();


if(isset($_SESSION['username'])){
    echo "<h1> Welcome {$_SESSION['username']} </h1> ";
    echo '<a href="logout.php">log out</a>';
} else {
    echo "<h1>Welcome guest</h1>";
    echo '<a href="/sessions.php">Home </a>';
}