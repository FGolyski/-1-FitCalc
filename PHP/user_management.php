<?php
include("db_connect.php");

$polaczenie = new mysqli($serwer, $user, $haslo, $baza) or die('Nie udało się połączyć z bazą danych');

if(isset($_POST['action'])) {
    if($_POST['action'] === 'change_password') {
        $id = $_POST['user_list'];
        $password = $_POST['password'];
        $sql="UPDATE `users` SET `password` = '$password' WHERE `users`.`id` = $id";
        $polaczenie->query($sql);
        $polaczenie->close();
        header("Location: ../admin_panel.php?change_success=1");
        
    } elseif($_POST['action'] === 'delete') {
        $id = $_POST['user_list'];
        $sql="DELETE FROM users WHERE `users`.`id` = $id";
        $polaczenie->query($sql);
        $polaczenie->close();
        header("Location: ../admin_panel.php?remove_success=1");

    }
}