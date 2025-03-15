<?php
include("db_connect.php");

$polaczenie = new mysqli($serwer, $user, $haslo, $baza) or die('Nie udało się połączyć z bazą danych');

if(isset($_POST['action'])) {
    if($_POST['action'] === 'change') {
        $id = $_POST['post_id'];
        $title = $_POST['title'];
        $article = $_POST['content'];
        $sql = "UPDATE `posts` SET `title` = '$title', `content` = '$article' WHERE `post_id` = $id";
        $polaczenie->query($sql);
        $polaczenie->close();
        header("Location: ../admin_panel.php?change_article=1");
        exit();
        
    } elseif($_POST['action'] === 'delete') {
        $id = $_POST['post_id'];
        $sql = "DELETE FROM posts WHERE `posts`.`post_id` = $id";
        $polaczenie->query($sql);
        $polaczenie->close();
        header("Location: ../admin_panel.php?remove_article=1");
        exit();
    }
}
?>
