<?php
include("db_connect.php");
session_start();
$polaczenie = new mysqli($serwer, $user, $haslo, $baza) or die('Can\'t connect to database');

$content = mysqli_real_escape_string($polaczenie, $_POST['content']);
$title = mysqli_real_escape_string($polaczenie, $_POST['title']);

$sql = "UPDATE `content` SET `title` = '$title' , `article` = '$content' WHERE `content`.`id` = 1";

$polaczenie->query($sql);
header("location: ../cal_calc.php?add_success=1");
$polaczenie->close();
?>
