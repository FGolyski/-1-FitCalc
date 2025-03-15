<?php
include("db_connect.php");
session_start();
$polaczenie = new mysqli($serwer, $user, $haslo, $baza);

$title = $_POST['title'];
$content = $_POST['content'];

$img_tmp = $_FILES['image']['tmp_name'];
$img_name = $_FILES['image']['name'];

$upload_directory = '../mainjpg/';
$img_path = $upload_directory . $img_name;
$sql = "INSERT INTO `posts` (`post_id`, `title`, `content`, `image_path`) VALUES (NULL, '$title', '$content', '$img_name')";

if(move_uploaded_file($img_tmp, $img_path)) {
    $polaczenie->query($sql);
    header("location: ../admin_panel.php?add_article=1");
}


$polaczenie->close();
?>
