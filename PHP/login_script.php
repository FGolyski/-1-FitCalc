<?php
include("db_connect.php");
session_start();
$polaczenie = new mysqli($serwer, $user, $haslo, $baza) or die('Cant connect to database');

$username = $_POST['username'];
$password = $_POST['password'];
$username = strtolower(htmlentities($username, ENT_QUOTES,'UTF-8'));
$password = htmlentities($password, ENT_QUOTES,'UTF-8');
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $polaczenie->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if(password_verify($password, $row["password"])) {
    $_SESSION['username'] = $username;
    header('Location: ../index.php');
    }
} else {
    header('Location: ../login.php?error=1');
}

$polaczenie->close();
?>
