<?php
include("db_connect.php");
session_start();
$polaczenie = new mysqli($serwer, $user, $haslo, $baza) or die('Cant connect to database');

$username = $_SESSION['username'];

$kcal = $_POST['kcal'];
$fat = $_POST['fat'];
$carbs = $_POST['carbs'];
$proteins = $_POST['proteins'];
$name = $_POST['name'];

$kcal = htmlentities($kcal, ENT_QUOTES, "UTF-8");
$carbs = htmlentities($carbs, ENT_QUOTES, "UTF-8");
$fat = htmlentities($fat, ENT_QUOTES, "UTF-8");
$proteins = htmlentities($proteins, ENT_QUOTES, "UTF-8");
$name = htmlentities($name, ENT_QUOTES, "UTF-8");

$sql = "INSERT INTO `products` (`id`, `nazwa`, `kcal`, `bialka`, `tluszcze`, `weglowodany`, `autor`) VALUES (NULL, '$name', '$kcal', '$proteins', '$fat', '$carbs', '$username')";

$polaczenie->query($sql);
    header("location: ../product_base_page.php?add_success=1");


$polaczenie->close();
?>
