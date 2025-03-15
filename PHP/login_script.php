<?php
include("db_connect.php");
session_start();
$polaczenie = new mysqli($serwer, $user, $haslo, $baza) or die('Cant connect to database');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $polaczenie->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    header('Location: ../index.php');
} else {
    header('Location: ../login.php?error=1');
}

$polaczenie->close();
?>
