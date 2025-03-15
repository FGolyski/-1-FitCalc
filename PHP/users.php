<?php
include("db_connect.php");

$polaczenie = new mysqli($serwer, $user, $haslo, $baza) or die('Nie udało się połączyć z bazą danych');
$pytanie = $polaczenie->query("SELECT * FROM `users` ORDER BY `username` ASC;");

while ($row = mysqli_fetch_array($pytanie)) {
    $login = $row["username"];
    $id = $row["id"];
    echo "<option value=\"$id\">$login</option>";
}
$polaczenie->close();