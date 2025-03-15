<?php
include("db_connect.php");
session_start();


$polaczenie = new mysqli($serwer, $user, $haslo, $baza) or die('Cant connect to database');

$username = $_POST['username'];
$password = $_POST['password'];

$exist_check = "SELECT * FROM users WHERE username='$username'";
$check_result = $polaczenie->query($exist_check);

if ($check_result->num_rows > 0) {
    header('Location: ../login.php?error_reg=1');
} else {
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($polaczenie->query($sql) === TRUE) {
        $_SESSION['username'] = $username;
        header('Location: ../index.php');
    } else {

    }
}

$polaczenie->close();
?>