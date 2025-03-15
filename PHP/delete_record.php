<?php
include("../PHP/db_connect.php");

$polaczenie = new mysqli($serwer, $user, $haslo, $baza) or die('Nie udało się połączyć z bazą danych');

$id = $_POST['id_key'];
$polaczenie->query("DELETE FROM products WHERE id = '$id'");
header('Location: ../product_base_page.php?remove_success=1');
$polaczenie->close();